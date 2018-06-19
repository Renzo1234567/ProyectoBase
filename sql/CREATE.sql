Create table Lugar_bd (
Luga_Codigo serial,
Luga_Nombre varchar(200) not null,
Luga_Tipo varchar(200) not null,
Cf_Luga_Lugar integer,
Constraint CP_Luga_Codigo primary key(Luga_Codigo),
Constraint CF_luga_lugar foreign key(CF_luga_lugar) references lugar_bd(Luga_codigo)
 );

Create table tienda_bd (
tien_clave serial,
Tien_Nombrevarchar(255) not null,
Tien_Tipovarchar(255) not null,
cf_tien_lugar integer,
Constraint Cp_tien_clave primary key(tien_clave),
Constraint CF_tien_lugar foreign key (cf_tien_lugar) referenceslugar_bd(luga_codigo)
);
	
Create table Rol_bd(
rol_codigo serial,
rol_nombre varchar(255) NOT NULL,
rol_descripcion varchar(255),
Constraint CP_rol_codigo primary key(rol_codigo)
);


Create table permiso_bd (
Perm_clave serial,
    Perm_accion varchar(255) NOT NULL,
Constraint Cp_perm_clave primary key (perm_clave)
);

Create table permiso_rol (
    cf_perm_rol_permiso integer NOT NULL,
    cf_perm_rol_rol integer NOT NULL,
Constraint cf_perm_rol_permiso foreign key(cf_perm_rol_permiso) references
permiso_bd(perm_clave),
Constraint cf_perm_rol_rol foreign key(cf_perm_rol_rol) references
rol_bd(rol_codigo)
);

CREATE TABLE tipo_bd
(
tipo_id serial,
prod_nombre varchar(255) NOT NULL,
Constraint CP_tipo_id primary key(tipo_id)
);

CREATE TABLE producto_bd
(
prod_id serial,
prod_nombre varchar(255) NOT NULL,
prod_descripcion varchar(255) NOT NULL,
Constraint CP_prod_id primary key(prod_id)
);

Create table producto_tipo(
Cf_prod_tipo_prodcuto integer,
Cf_prod_tipo_tipo integer,
Constraint Cf_prod_tipo_prodcuto foreign key(Cf_prod_tipo_prodcuto) references producto_bd(prod_id),
Constraint Cf_prod_tipo_tipo foreign key(Cf_prod_tipo_tipo) references tipo_bd(tipo_id)
);

Create table diario_bd(
diar_id serial,
diar_fechapublicacion date NOT NULL,
diar_fechafin date not null,
Constraint CP_diar_id primary key(diar_id)
);

CREATE TABLE oferta_bd
(
    ofer_porcentaje numeric(255,100) NOT NULL,
    cf_ofer_producto integer NOT NULL,
    cf_ofer_diario integer NOT NULL,
Constraint cf_ofer_producto foreign key(cf_ofer_producto) references producto_bd(prod_id),
Constraint cf_ofer_diario foreign key(cf_ofer_diario) references diario_bd(diar_id)
);



CREATE TABLE natural_bd
(
    natu_rif numeric,
natu_correo varchar(255),
natu_cedula numeric NOT NULL,
    natu_nombre1 varchar(255) NOT NULL,
    natu_nombre2 varchar(255),
    natu_apellido1 varchar(255) NOT NULL,
    natu_apellido2 varchar(255),
cf_natu_lugar integer NOT NULL,
CONSTRAINT cp_natu_rif primary key(natu_rif),
Constraint cf_natu_lugar foreign key(cf_natu_lugar) references lugar_bd(luga_codigo)
);

CREATE TABLE juridico_bd
(
juri_rif numeric,
juri_correo varchar(255),
juri_denominacion varchar(255) NOT NULL,
juri_razon varchar(255) NOT NULL,
juri_paginawebvarchar(255),
juri_capital numeric(255,100) NOT NULL,
cf_juri_lugar_dirfiscal integer NOT NULL,
cf_juri_lugar_dirprincipal integer NOT NULL,
Constraint CP_juri_rif primary key(juri_rif),
Constraint CF_juri_lugar_dirfiscal foreign key(CF_juri_lugar_dirfiscal) references lugar_bd(luga_codigo),
Constraint cf_juri_lugar_dirprincipal foreign key(cf_juri_lugar_dirprincipal) references lugar_bd(luga_codigo)
);

Create table tienda_cliente(
Tien_clien_clave serial,
Cf_Tien_clien_juridico numeric,
Cf_Tien_clien_natural numeric,
Cf_tien_clien_tienda integer NOT NULL,
Constraint cp_tien_clien_clave primary key(Tien_clien_clave),
Constraint Cf_Tien_clien_juridico foreign key(Cf_Tien_clien_juridico) references juridico_bd(juri_rif),
Constraint Cf_Tien_clien_natural foreign key(Cf_Tien_clien_natural) references natural_bd(natu_rif),
Constraint Cf_Tien_clien_tienda foreign key(Cf_Tien_clien_tienda) references tienda_bd(tien_clave)
);

Create table carnet_bd(
carn_clave serial,
carn_fecha date NOT NULL,
cf_carn_tienda_cliente integer Unique,
Constraint CP_carn_clave primary key(carn_clave),
Constraint cf_carn_tienda_cliente foreign key(cf_carn_tienda_cliente) references tienda_cliente(tien_clien_clave)
);

Create table empleado_bd(
empl_ci numeric,
empl_nombre1 varchar(255) NOT NULL,
    empl_nombre2 varchar(255),
    empl_apellido1 varchar(255) NOT NULL,
    empl_apellido2 varchar(255),
cf_empl_tienda integer,
Constraint CP_empl_ci primary key(empl_ci),
Constraint cf_empl_tienda foreign key(cf_empl_tienda) references tienda_bd(tien_clave)
);

Create table Usuario_bd(
usua_token varchar(255),
    usua_nombre varchar(255) NOT NULL,
    usua_contraseña varchar(255) NOT NULL,
    usua_fecharegistro date NOT NULL,
cf_usua_juridico numeric,
cf_usua_natural numeric,
CF_usua_rol integer Not null,
Cf_usua_empleado numeric,
Constraint CP_usua_token primary key(usua_token),
Constraint CF_usua_rol foreign key (CF_usua_rol) references rol_bd(rol_codigo),
Constraint cf_usua_juridico foreign key(cf_usua_juridico) references juridico_bd(juri_rif),
Constraint cf_usua_natural foreign key(cf_usua_natural) references natural_bd(natu_rif),
Constraint cf_usua_empleado foreign key(cf_usua_empleado) references empleado_bd(empl_ci)
);


CREATE TABLE vacacion_bd
(
    vaca_clave serial,
    vaca_fechainicio date NOT NULL,
    vaca_fechafin date NOT NULL,
CF_vaca_empleado numeric,
Constraint  CP_vaca_clave primary key(vaca_clave),
Constraint CF_vaca_empleado foreign key(CF_vaca_empleado) references empleado_bd(empl_ci)
);

Create table asistencia_bd (
asis_clave serial,
asis_fecha date not null,
asis_horario_inicio time not null,
asis_horario_fin time not null,
CF_asis_empleado numeric,
Constraint Cp_asis_clave primary key(asis_clave),
Constraint CF_asis_empleado foreign key (CF_asis_empleado) references empleado_bd(empl_ci)
	);

CREATE TABLE horario_bd
(
hora_clave serial,
hora_dia varchar (50) NOT NULL,
hora_inicio time NOT NULL,
    hora_fin  time NOT NULL,
Constraint CP_hora_clave primary key(hora_clave)
);

CREATE TABLE empleado_horario
(
cf_empl_hora_empleado numeric NOT NULL,
cf_empl_hora_horario integer NOT NULL,
Constraint CF_empl_hora_empleado foreign key(CF_empl_hora_empleado) references empleado_bd(empl_ci),
Constraint CF_empl_hora_horario foreign key(CF_empl_hora_horario) references horario_bd(hora_clave)
);

Create table departamento_bd (
depa_clave serial,
depa_Nombre varchar(255) not null,
depa_Tipo varchar(255) not null,
ConstraintCp_depa_clave primary key(depa_clave)
);

Create table departamento_tienda (
Cf_depa_tien_departamento integer not null,
Cf_depa_tien_tiendainteger not null
);

CREATE TABLE telefono_bd
(
tele_codigo serial,
tele_numero numeric NOT NULL,
cf_tele_juridico numeric,
cf_tele_natural numeric,
Constraint cp_tele_codigo primary key(tele_codigo),
Constraint cf_tele_juridico foreign key(cf_tele_juridico) references juridico_bd(juri_rif),
Constraint cf_tele_natural foreign key(cf_tele_natural) references natural_bd(natu_rif)
);

CREATE TABLE banco_bd
(
    banc_codigo serial,
    banc_nombre varchar(255) NOT NULL,
Constraint cp_banc_codigo primary key(banc_codigo)
);



Create table punto_bd(
punt_clave serial,
punt_valor numeric(100) NOT NULL,
Constraint CP_punt_clave primary key(punt_clave)
);

Create table cliente_punto(
clie_punt_valormomento numeric(100),
clie_punt_fecha date NOT NULL,
clie_punt_cantidad numeric(100) not null,
Cf_clie_punt_punto integer not null,
Cf_clie_punt_juridico numeric,
Cf_clie_punt_natural numeric,
Constraint   Cf_clie_punt_punto foreign key (Cf_clie_punt_punto) referencespunto_bd(punt_clave),
Constraint Cf_clie_punt_juridico foreign key (Cf_clie_punt_juridico) references juridico_bd(juri_rif),
Constraint Cf_clie_punt_natural foreign key (Cf_clie_punt_natural) references natural_bd(natu_rif)
);

CREATE TABLE presupuesto_bd
(
    pres_id serial,
    pres_fecha date NOT NULL,
    pres_montototal numeric NOT NULL,
    cf_pres_usuario varchar(255) NOT NULL,
Constraint cp_pres_id primary key(pres_id),
Constraint cf_pres_usuario foreign key(cf_pres_usuario) references usuario_bd(usua_token)
);

CREATE TABLE tarjeta_bd
(
tarj_codigo serial,
tarj_numero varchar(255) NOT NULL,
tarj_tipo varchar(1) NOT NULL,
cf_tarj_banco integer,
Constraint cp_tarj_codigo primary key(tarj_codigo),
Constraint cf_tarj_banco foreign key(cf_tarj_banco) references banco_bd(banc_codigo),
Constraint Check_tarjeta_tipo Check (tarj_tipo IN ('d','c'))
);

CREATE TABLE cheque_bd
(
    cheq_codigo serial,
    cheq_numero varchar(255) NOT NULL,
    cf_cheq_banco integer not null,
Constraint cp_cheq_codigo primary key(cheq_codigo),
Constraint cf_cheq_banco foreign key(cf_cheq_banco) references banco_bd(banc_codigo)
);

CREATE TABLE efectivo_bd
(
efec_codigo serial,
Constraint cp_efec_codigo primary key(efec_codigo)
);

Create table estatus_bd(
Esta_clave serial,
Esta_nombre varchar(255),
ConstraintCP_esta_clave primary key(esta_clave)
);

Create table compra_bd
(
    comp_id serial,
    comp_montotal numeric(255,100) NOT NULL,
    cf_comp_juridico numeric,
cf_comp_natural numeric,
Constraint CP_comp_id primary key(comp_id),
Constraint CF_comp_juridico foreign key(Cf_comp_juridico) references juridico_bd(juri_rif),
Constraint CF_comp_natural foreign key(Cf_comp_natural) references natural_bd(natu_rif) 
);

Create table Compra_estatus(
Comp_esta_fechaini date,
Comp_esta_fechafin date,
CF_Comp_esta_compra integer not null,
CF_comp_esta_estatus integer not null,
Constraint CF_Comp_esta_compra foreign key(CF_Comp_esta_compra) references compra_bd(comp_id),
Constraint CF_comp_esta_estatus foreign key(CF_comp_esta_estatus) references estatus_bd(esta_clave)
);

CREATE TABLE presupuesto_producto_bd
(
    pre_pro_id serial,
    pre_pro_cantidad numeric (255) NOT NULL,
    cf_pre_pro_producto integer NOT NULL,
    cf_pre_pro_presupuesto integer NOT NULL,
    cf_pre_pro_compra integer not null,
constraint cp_pre_pro_id primary key(pre_pro_id),
Constraint cf_pre_pro_producto foreign key(cf_pre_pro_producto) references producto_bd(prod_id),
Constraint cf_pre_pro_presupuesto foreign key(cf_pre_pro_presupuesto) references presupuesto_bd(pres_id),
Constraint cf_pre_pro_compra foreign key(cf_pre_pro_compra) references compra_bd(comp_id)
);

Create table pago_bd(
Pago_codigo serial,
Pago_montonumeric(255,100),
Cf_pago_compra integer,
Cf_pago_punto integer,
Constraint CP_pago_codigo primary key(pago_codigo),
Constraint Cf_pago_compra foreign key(cf_pago_compra) references compra_bd(comp_id),
Constraintcf_pago_punto foreign key(cf_pago_punto) references punto_bd(punt_clave)
);

CREATE TABLE ordenreposicion_bd
(
orde_clave serial,
orde_descripcion varchar(255) NOT NULL,
orde_fecha date not null,
    cf_orde_tienda integer NOT NULL,
Constraint cp_orde_clave primary key(orde_clave),
Constraint cf_orde_tienda foreign key(cf_orde_tienda) references tienda_bd(tien_clave)
);

CREATE TABLE Orden_producto
(
Orde_proc_cantidad numeric(255),
Cf_Orde_proc_ordenreposicion integer NOT NULL,
Cf_Orde_proc_producto integer NOT NULL,
Constraint Cf_Orde_proc_ordenreposicion foreign key(Cf_Orde_proc_ordenreposicion) references ordenreposicion_bd(orde_clave),
Constraint Cf_Orde_proc_producto foreign key(Cf_Orde_proc_producto) references producto_bd(prod_id)
);

CREATE TABLE mediospago
(
cf_clie_medi_juridico numeric,
cf_clie_medi_natural numeric,
cf_clie_medi_tarjeta integer,
cf_clie_medi_cheque integer,
cf_clie_medi_efecivo integer,
Constraint cf_clie_medi_juridico foreign key(cf_clie_medi_juridico) references juridico_bd(juri_rif),
Constraint cf_clie_medi_natural foreign key(cf_clie_medi_natural) references natural_bd(natu_rif),
Constraint cf_clie_medi_tarjeta foreign key(cf_clie_medi_tarjeta) references tarjeta_bd(tarj_codigo),
Constraint cf_clie_medi_cheque foreign key(cf_clie_medi_cheque) references cheque_bd(cheq_codigo),
Constraintcf_clie_medi_efecivo foreign key(cf_clie_medi_efecivo) references efectivo_bd(efec_codigo)
) ;
Create table inventario(
Inve_cantidad numeric(255),
Cf_inventario_tienda integer,
Cf_inventario_producto integer
);

