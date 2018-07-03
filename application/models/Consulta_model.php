<?php

/**
 * TodAS lAS consultAS deben ser precargadAS
 */
clASs Consulta_model extends MY_Model
{
    
    private $sql;

    public function __construct()
    {
        parent::__construct();
        $this->sql = array(
            'consulta-1' => "SELECT SUM(p.pago_monto) AS Ingresos,SUM(e.empl_salario) AS Egresos
FROM empleado_bd e,pago_bd p',
            
            'consulta-2' => 'SELECT ASIS.ASis_horario_inicio AS Hora_de_entrada, ASIS.ASis_horario_fin AS Hora_de_Salida,EMP.empl_ci AS Cedula,EMP.empl_nombre1 AS Primer_Nombre,EMP.empl_nombre2 AS Segundo_Nombre,EMP.empl_apellido1 AS Primer_Apellido,EMP.empl_apellido2 AS Segundo_Apellido,D.depa_nombre
FROM empleado_bd EMP, ASistencia_bd ASIS,departamento_bd D, departamento_tienda DT,tienda_bd t
WHERE ASIS.cf_ASis_empleado=EMP.empl_ci AND
DT.depa_tien_clave  = EMP.cf_empl_depa_tien AND
D.depa_clave=DT.cf_depa_tien_departamento AND
t.tien_clave =DT.cf_depa_tien_tienda
ORDER BY 4,5;",
            
            'consulta-3' => "SELECT EMP.empl_nombre1 AS Empleado, SUM(ASIS.ASis_horario_fin - ASIS.ASis_horario_inicio) AS HorAS_TrabajadAS, AVG(ASIS.ASis_horario_inicio )AS Promedio_horAS_entrada,AVG(ASIS.ASis_horario_fin) AS Promedio_horAS_salida,count(ASIS.*)-count(ASIS.ASis_horario_inicio) AS AusenciAS,SUB.retrASo
FROM ASistencia_bd ASIS,empleado_bd EMP,(SELECT COUNT(ASIS.ASis_horario_inicio) AS retrASo,EMP.empl_ci AS E
FROM ASistencia_bd ASIS,empleado_bd EMP
WHERE ASIS.cf_ASis_empleado=EMP.empl_ci AND
ASis.ASis_horario_inicio >= '8:00'
GROUP BY EMP.empl_nombre1,EMP.empl_ci) AS SUb
WHERE ASIS.cf_ASis_empleado=EMP.empl_ci 
AND SUB.E = EMP.empl_ci 
GROUP BY EMP.empl_nombre1,SUB.retrASo",
            
            'consulta-4' => "SELECT consulta2.tienda,consulta2.rif
From(SELECT Consulta.tienda AS tienda,consulta.cliente AS rif,consulta.cuenta
FROM
(SELECT T.tien_nombre AS Tienda,Clie.natu_Rif AS CLIENTE,COUNT(P.*) AS Cuenta
FROM Tienda_bd t, Natural_bd Clie,Pago_bd P, compra_bd COM
WHERE P.cf_pago_compra = COM.comp_id AND 
COM.cf_comp_natural = CLIE.natu_rif AND
CLIE.cf_natu_tienda = T.tien_clave
GROUP BY T.tien_nombre,Clie.natu_Rif

UNION

 SELECT T.tien_nombre ,Clie.juri_Rif AS CLIENTE,COUNT(P.*) 
FROM Tienda_bd t, Juridico_bd Clie,Pago_bd P, compra_bd COM
WHERE P.cf_pago_compra = COM.comp_id AND 
COM.cf_comp_natural = CLIE.juri_rif AND
CLIE.cf_juri_tienda = T.tien_clave
GROUP BY T.tien_nombre,Clie.juri_Rif
) AS CONSULTA
ORDER BY 3 DESC
LIMIT 10) AS CONSULTA2",
           
            'consulta-5' => "SELECT CONSULTA.RIF AS RIF, CONSULTA.TOTAL AS Monto_total
FROM(SELECT CLIE.natu_rif AS RIF,SUM(COM.comp_montotal) AS TOTAL
FROM natural_bd CLIE,compra_bd COM, Pago_bd P
WHERE P.cf_pago_compra = COM.comp_id AND 
COM.cf_comp_natural = CLIE.natu_rif 
GROUP BY CLIE.natu_rif

UNION

SELECT CLIE.juri_rif ,SUM(COM.comp_montotal) 
FROM juridico_bd CLIE,compra_bd COM, Pago_bd P
WHERE P.cf_pago_compra = COM.comp_id AND 
COM.cf_comp_natural = CLIE.juri_rif 
GROUP BY CLIE.juri_rif) AS CONSULTA
ORDER BY 2 DESC
Limit 5;",

            'consulta-6' => "SELECT Consulta.RIF,Consulta.Puntaje
FROM
(SELECT CLIE.natu_rif AS RIF, CP.clie_punt_cantidad AS Puntaje
FROM  natural_bd CLIE, cliente_punto CP
WHERE CP.Cf_clie_punt_natural = CLIE.natu_rif
GROUP BY CLIE.natu_rif,CP.clie_punt_cantidad

UNION

SELECT CLIE.juri_rif, CP.clie_punt_cantidad
FROM  juridico_bd CLIE, cliente_punto CP
WHERE CP.Cf_clie_punt_juridico = CLIE.juri_rif
GROUP BY CLIE.juri_rif,CP.clie_punt_cantidad) AS Consulta 
ORDER BY 2 DESC",

            'consulta-7' => "SELECT Consulta.marca
FROM (SELECT MAR.marc_nombre AS MARCA,COUNT(MAR.marc_nombre)
FROM tarjeta_bd TJ, mediospago MP, natural_bd Clie,marca_bd MAR
WHERE MP.cf_clie_medi_tarjeta= TJ.tarj_codigo AND
MP.cf_clie_medi_natural = CLIE.natu_rif AND
mar.marc_clave = TJ.cf_tarj_marca AND
TJ.tarj_tipo = 'c'
GROUP BY MAR.marc_nombre
ORDER BY 1 DESC LIMIT 1) AS Consulta",

            'consulta-8' => "SELECT Consulta.tienda FROM
(SELECT  consulta.tienda AS tienda, consulta.conteo AS conteo
 FROM
(SELECT T.tien_nombre AS tienda, COUNT(PAG.cf_pago_clie_punt) AS conteo
FROM tienda_bd t, natural_bd CLIE,compra_bd COM, pago_bd PAG,Cliente_punto CP
WHERE t.tien_clave = CLIE.cf_natu_tienda AND
COM.cf_comp_natural = CLIE.natu_rif AND
COM.comp_id = PAG.cf_pago_compra AND
CP.clie_punt_clave = PAG.pago_codigo AND
PAG.cf_pago_clie_punt IS NOT NULL
GROUP BY T.tien_nombre
 
 UNION

 SELECT T.tien_nombre AS tienda, COUNT(PAG.cf_pago_clie_punt) AS conteo
FROM tienda_bd t, juridico_bd CLIE,compra_bd COM, pago_bd PAG,Cliente_punto CP
WHERE t.tien_clave = CLIE.cf_juri_tienda AND
COM.cf_comp_juridico = CLIE.juri_rif AND
COM.comp_id = PAG.cf_pago_compra AND
CP.clie_punt_clave = PAG.pago_codigo AND
PAG.cf_pago_clie_punt IS NOT NULL
GROUP BY T.tien_nombre

) AS CONSULTA
ORDER BY 2 DESC,1 DESC
LIMIT 5) AS Consulta",

            'consulta-9' => "SELECT Consulta.rif,consulta.total AS Monto_total
FROM(SELECT CLIE.natu_rif AS rif,SUM(COM.comp_montotal) AS TOTAL
FROM Natural_bd CLIE,compra_bd COM,pago_bd PAG
WHERE CLIE.natu_rif= COM.cf_comp_natural AND
COM.comp_id = PAG.cf_pago_compra
GROUP BY CLIE.natu_rif
UNION
SELECT CLIE.juri_rif,SUM(COM.comp_montotal) 
FROM Juridico_bd CLIE,compra_bd COM,pago_bd PAG
WHERE CLIE.juri_rif= COM.cf_comp_juridico AND
COM.comp_id = PAG.cf_pago_compra
GROUP BY CLIE.juri_rif) AS Consulta
ORDER BY 2 DESC,1 DESC
LIMIT 10;",
            'consulta-10' => "SELECT Consulta.ingrediente
FROM
(SELECT IG.Ingr_nombre AS ingrediente, SUM(INP.ingr_prod_tipo_cantidad)
FROM ingrediente_bd IG, producto_tipo PRO,ingrediente_producto_tipo INP
WHERE IG.ingr_clave = INP.cf_ingr_prod_tipo_ingr AND
INP.cf_ingr_prod_tipo = PRO.prod_tipo_clave
GROUP BY IG.Ingr_nombre
ORDER BY SUM(INP.ingr_prod_tipo_cantidad) DESC
LIMIT 1) AS Consulta",

            'consulta-11' => "SELECT Consulta.producto,consulta.tienda
FROM
(SELECT P.prod_nombre AS producto, t.tien_nombre AS tienda,COUNT(PAG.*)
FROM producto_bd P,tienda_bd T, inventario_bd IV, Producto_tipo PT,presupuesto_producto_bd PRE,compra_bd COM, Pago_bd PAG
WHERE T.tien_clave= IV.cf_inv_tienda AND
IV.cf_inv_producto_tipo = PT.prod_tipo_clave AND
PT.cf_prod_tipo_producto = P.prod_id AND
PRE.cf_pre_pro_producto_tipo = PT.prod_tipo_clave AND
COM.comp_id = PRE.cf_pre_pro_compra AND
COM.comp_id = PAG.cf_pago_compra
GROUP BY P.prod_nombre, t.tien_nombre
ORDER BY 3 DESC ,2 DESC ,1 DESC) AS Consulta",

'consulta-12' => "SELECT t.tien_nombre,p.prod_nombre,COUNT(P.*)
FROM lugar_bd L,producto_bd P,tienda_bd T, inventario_bd IV, Producto_tipo PT,presupuesto_producto_bd PRE,compra_bd COM, Pago_bd PAG
WHERE T.tien_clave= IV.cf_inv_tienda AND
IV.cf_inv_producto_tipo = PT.prod_tipo_clave AND
PT.cf_prod_tipo_producto = P.prod_id AND
PRE.cf_pre_pro_producto_tipo = PT.prod_tipo_clave AND
COM.comp_id = PRE.cf_pre_pro_compra AND
COM.comp_id = PAG.cf_pago_compra  AND
L.luga_codigo = T.cf_tien_lugar
GROUP BY  t.tien_nombre,p.prod_nombre,L.luga_nombre
ORDER BY t.tien_nombre DESC, L.luga_nombre DESC,COUNT(P.*) DESC ",


'consulta-13' => "SELECT Consulta.tienda,Consulta.RIF
FROM
(SELECT T.tien_nombre AS Tienda, CLIE.natu_rif AS RIF,COUNT(PAG.pago_monto)AS Cuenta
FROM tienda_bd T, natural_bd CLIE ,Compra_bd COM, Pago_bd PAG,Presupuesto_producto_bd PRE, presupuesto_bd PS
WHERE T.tien_clave = CLIE.cf_natu_tienda AND
PRE.cf_pre_pro_compra =COM.comp_id AND
PAG.pago_codigo = COM.comp_id AND
CLIE.natu_rif= COM.cf_comp_natural AND
PRE.cf_pre_pro_presupuesto = PS.pres_id
Group by T.tien_nombre,CLIE.natu_rif
ORDER BY 1 DESC, 3 DESC) AS Consulta",

'consulta-14' => 'SELECT Consulta.nombre
FROM
(SELECT ES.esta_nombre AS nombre,(CE.comp_esta_fechafin - CE.comp_esta_fechaini) AS Cuenta
FROM compra_estatus CE ,estatus_bd Es
ORDER BY Cuenta DESC
LIMIT 1) AS Consulta',

'consulta-15' => "SELECT Consulta.nombre
FROM(SELECT Consulta.nombre,Consulta.cuenta
FROM
(SELECT T.tarj_nombre AS nombre, COUNT(T.*) AS cuenta
FROM tarjeta_bd T ,Mediospago MP, Pago_bd PAG,Compra_bd COM
WHERE MP.cf_clie_medi_tarjeta = T.tarj_codigo AND
MP.medi_clave = PAG.cf_pago_mediospago AND
PAG.cf_pago_compra = COM.comp_id AND
COM.cf__comp_comp_fisica  IS NOT null
GROUP BY T.tarj_nombre

UNION

SELECT CHE.cheq_nombre, COUNT(CHE.*)
FROM cheque_bd CHE,Mediospago MP, Pago_bd PAG,Compra_bd COM
WHERE MP.cf_clie_medi_cheque = CHE.cheq_codigo AND
 MP.medi_clave = PAG.cf_pago_mediospago AND
 PAG.cf_pago_compra = COM.comp_id AND
 COM.cf__comp_comp_fisica  IS NOT null
 
GROUP BY CHE.cheq_nombre) AS Consulta
ORDER BY 2 DESC
LIMIT 1) AS Consulta",


'consulta-16' => "SELECT T.tien_nombre,SUM(CP.clie_punt_cantidad) AS Puntos_Otorgados,SUM(PC.punt_cant_cantidad)
FROM cliente_punto CP,punto_cantidad PC,Tienda_bd T, natural_bd CLIE,compra_bd COM, pago_bd PAG,lugar_bd L
WHERE T.cf_tien_lugar = L.luga_codigo AND
T.tien_clave = CLIE.cf_natu_tienda AND
CLIE.natu_rif= COM.cf_comp_natural AND
COM.comp_id=PAG.cf_pago_compra AND
PAG.cf_pago_punt_cantidad = PC.punt_cant_clave AND
PC.cf_punt_cant_clie_punt = CP.clie_punt_clave
GROUP BY T.tien_nombre, L.*
ORDER BY T.tien_nombre DESC,L.* DESC",
        );
    }
    
    public function ejecutar($consulta_id) {
        
        $sql = $this->sql[$consulta_id];
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        
        $return = array();
        while($row = pg_fetch_ASsoc($result))
            $return[] = $row;

        return $return;
    }
    
}
