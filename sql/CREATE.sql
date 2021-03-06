create table lugar_bd (
luga_codigo serial,
luga_nombre varchar(255) not null,
luga_tipo varchar(255) not null,
cf_luga_lugar integer,
constraint cp_luga_codigo primary key(luga_codigo),
constraint cf_luga_lugar foreign key(cf_luga_lugar) references lugar_bd(luga_codigo)
 );

create table tienda_bd (
tien_clave serial,
tien_nombre varchar(255) not null,
tien_tipo varchar(255) not null,
cf_tien_lugar integer,
constraint cp_tien_clave primary key(tien_clave),
constraint cf_tien_lugar foreign key (cf_tien_lugar) references lugar_bd(luga_codigo)
);

create table rol_bd(
rol_codigo serial,
rol_nombre varchar(255) not null,
rol_descripcion varchar(255),
constraint cp_rol_codigo primary key(rol_codigo)
);

create table permiso_bd (
perm_clave serial,
perm_accion varchar(255) not null,
constraint cp_perm_clave primary key (perm_clave)
);

create table permiso_rol (
cf_perm_rol_permiso integer not null,
cf_perm_rol_rol integer not null,
constraint cf_perm_rol_permiso foreign key(cf_perm_rol_permiso) references
permiso_bd(perm_clave),
constraint cf_perm_rol_rol foreign key(cf_perm_rol_rol) references
rol_bd(rol_codigo)
);

create table tipo_bd
(
tipo_id serial,
tipo_nombre varchar(255) not null,
constraint cp_tipo_id primary key(tipo_id)
);

create table producto_bd
(
prod_id serial,
prod_nombre varchar(255) not null,
prod_descripcion varchar(255) not null,
constraint cp_prod_id primary key(prod_id)
);

create table producto_tipo(
prod_tipo_clave serial,
prod_tipo_preciounitario numeric not null,
prod_tipo_imagen varchar(255),
cf_prod_tipo_producto integer not null,
cf_prod_tipo_tipo integer not null,
constraint cp_prod_tipo_clave primary key(prod_tipo_clave),
constraint cf_prod_tipo_producto foreign key(cf_prod_tipo_producto) references producto_bd(prod_id),
constraint cf_prod_tipo_tipo foreign key(cf_prod_tipo_tipo) references tipo_bd(tipo_id)
);

create table diario_bd(
diar_id serial,
diar_fechapublicacion date not null,
diar_fechafin date not null,
constraint cp_diar_id primary key(diar_id)
);

create table oferta_bd(
ofer_porcentaje numeric(255,100) not null,
cf_ofer_prod_tipo integer not null,
cf_ofer_diario integer not null,
constraint cf_ofer_prod_tipo foreign key(cf_ofer_prod_tipo) references producto_tipo(prod_tipo_clave),
constraint cf_ofer_diario foreign key(cf_ofer_diario) references diario_bd(diar_id)
);

create table natural_bd(
natu_rif numeric,
natu_correo varchar(255),
natu_cedula numeric not null,
natu_nombre1 varchar(255) not null,
natu_nombre2 varchar(255),
natu_apellido1 varchar(255) not null,
natu_apellido2 varchar(255),
cf_natu_tienda integer not null,
cf_natu_lugar integer not null,
constraint cp_natu_rif primary key(natu_rif),
constraint cf_natu_tienda foreign key(cf_natu_tienda) references tienda_bd(tien_clave),
constraint cf_natu_lugar foreign key(cf_natu_lugar) references lugar_bd(luga_codigo)
);


create table juridico_bd(
juri_rif numeric,
juri_correo varchar(255),
juri_denominacion varchar(255) not null,
juri_razon varchar(255) not null,
juri_paginaweb varchar(255),
juri_capital numeric(255,100) not null,
cf_juri_tienda integer not null,
cf_juri_lugar_dirfiscal integer not null,
cf_juri_lugar_dirprincipal integer not null,
constraint cp_juri_rif primary key(juri_rif),
constraint cf_juri_lugar_dirfiscal foreign key(cf_juri_lugar_dirfiscal) references lugar_bd(luga_codigo),
constraint cf_juri_tienda foreign key(cf_juri_tienda) references tienda_bd(tien_clave),
constraint cf_juri_lugar_dirprincipal foreign key(cf_juri_lugar_dirprincipal) references lugar_bd(luga_codigo)
);

create table persona_bd(
pers_rif numeric,
pers_correo varchar(255),
pers_cedula numeric not null,
pers_nombre1 varchar(255) not null,
pers_nombre2 varchar(255),
pers_apellido1 varchar(255) not null,
pers_apellido2 varchar(255),
constraint cp_pers_rif primary key(pers_rif)
);

create table personacontacto_bd
(
cf_pers_rif numeric(255),
cf_juri_rif numeric(255), 
constraint   cf_pers_rif foreign key(  cf_pers_rif) references persona_bd(pers_rif),
constraint   cf_juri_rif foreign key(   cf_juri_rif) references juridico_bd(juri_rif)
);



create table tienda_cliente(
tien_clien_clave serial,
cf_tien_clien_juridico numeric,
cf_tien_clien_natural numeric,
cf_tien_clien_tienda integer not null,
constraint cp_tien_clien_clave primary key(tien_clien_clave),
constraint cf_tien_clien_juridico foreign key(cf_tien_clien_juridico) references juridico_bd(juri_rif),
constraint cf_tien_clien_natural foreign key(cf_tien_clien_natural) references natural_bd(natu_rif),
constraint cf_tien_clien_tienda foreign key(cf_tien_clien_tienda) references tienda_bd(tien_clave)
);

create table carnet_bd(
carn_clave serial,
carn_codigo varchar(255) unique not null,
carn_fecha date not null,
cf_carn_tienda_cliente integer unique,
constraint cp_carn_clave primary key(carn_clave),
constraint cf_carn_tienda_cliente foreign key(cf_carn_tienda_cliente) references tienda_cliente(tien_clien_clave)
);

create table departamento_bd (
depa_clave serial,
depa_nombre varchar(255) not null,
constraint cp_depa_clave primary key(depa_clave)
);

create table departamento_tienda (
depa_tien_clave serial,
cf_depa_tien_departamento integer not null,
cf_depa_tien_tienda integer not null,
constraint cp_depa_tien_clave primary key(depa_tien_clave),
constraint cf_depa_tien_departamento foreign key(cf_depa_tien_departamento) references departamento_bd(depa_clave),
constraint cf_depa_tien_tienda foreign key(cf_depa_tien_tienda) references tienda_bd(tien_clave)
);
create table empleado_bd(
empl_ci numeric,
empl_nombre1 varchar(255) not null,
empl_nombre2 varchar(255),
empl_apellido1 varchar(255) not null,
empl_apellido2 varchar(255),
empl_salario numeric,
cf_empl_depa_tien integer,
constraint cp_empl_ci primary key(empl_ci),
constraint cf_empl_depa_tien foreign key(cf_empl_depa_tien) references departamento_tienda(depa_tien_clave)
);

create table usuario_bd(
usua_token varchar(255),
usua_correo varchar(255) not null,
usua_contraseña varchar(255) not null,
usua_fecharegistro date not null,
cf_usua_juridico numeric,
cf_usua_natural numeric,
cf_usua_rol integer not null,
cf_usua_empleado numeric,
constraint cp_usua_token primary key(usua_token),
constraint cf_usua_rol foreign key (cf_usua_rol) references rol_bd(rol_codigo),
constraint cf_usua_juridico foreign key(cf_usua_juridico) references juridico_bd(juri_rif),
constraint cf_usua_natural foreign key(cf_usua_natural) references natural_bd(natu_rif),
constraint cf_usua_empleado foreign key(cf_usua_empleado) references empleado_bd(empl_ci)
);

create table vacacion_bd(
vaca_clave serial,
vaca_fechainicio date not null,
vaca_fechafin date not null,
cf_vaca_empleado numeric,
constraint  cp_vaca_clave primary key(vaca_clave),
constraint cf_vaca_empleado foreign key(cf_vaca_empleado) references empleado_bd(empl_ci)
);



create table horario_bd(
hora_clave serial,
hora_dia varchar (50) not null,
hora_inicio time not null,
hora_fin  time not null,
constraint cp_hora_clave primary key(hora_clave)
);

create table empleado_horario(
cf_empl_hora_empleado numeric not null,
cf_empl_hora_horario integer not null,
constraint cf_empl_hora_empleado foreign key(cf_empl_hora_empleado) references empleado_bd(empl_ci),
constraint cf_empl_hora_horario foreign key(cf_empl_hora_horario) references horario_bd(hora_clave)
);


create table telefono_bd(
tele_codigo serial,
tele_numero numeric not null,
cf_tele_juridico numeric,
cf_tele_natural numeric,
constraint cp_tele_codigo primary key(tele_codigo),
constraint cf_tele_juridico foreign key(cf_tele_juridico) references juridico_bd(juri_rif),
constraint cf_tele_natural foreign key(cf_tele_natural) references natural_bd(natu_rif)
);

create table banco_bd(
banc_codigo serial,
banc_nombre varchar(255) not null,
constraint cp_banc_codigo primary key(banc_codigo)
);

create table punto_bd(
punt_clave serial,
punt_valor numeric(100) not null,
constraint cp_punt_clave primary key(punt_clave)
);

create table cliente_punto(
clie_punt_clave serial,
clie_punt_valormomento numeric(100),
clie_punt_fecha date not null,
clie_punt_cantidad numeric(100) not null,
cf_clie_punt_punto integer not null,
cf_clie_punt_juridico numeric,
cf_clie_punt_natural numeric,
constraint cp_clie_punt_clave  primary key(clie_punt_clave),
constraint cf_clie_punt_punto foreign key (cf_clie_punt_punto) references punto_bd(punt_clave),
constraint cf_clie_punt_juridico foreign key (cf_clie_punt_juridico) references juridico_bd(juri_rif),
constraint cf_clie_punt_natural foreign key (cf_clie_punt_natural) references natural_bd(natu_rif)
);


create table presupuesto_bd
(
pres_id serial,
pres_fecha date not null,
pres_montototal numeric not null,
cf_pres_usuario varchar(255) not null,
constraint cp_pres_id primary key(pres_id),
constraint cf_pres_usuario foreign key(cf_pres_usuario) references usuario_bd(usua_token)
);

create table marca_bd(
marc_clave serial,
marc_nombre varchar(255),
Constraint cp_marc_clave primary key(marc_clave)
);

create table tarjeta_bd
(
tarj_codigo serial,
tarj_nombre varchar(255),
tarj_numero varchar(255) not null,
tarj_tipo varchar(1) not null,
cf_tarj_banco integer,
cf_tarj_marca integer,
constraint cp_tarj_codigo primary key(tarj_codigo),
constraint cf_tarj_banco foreign key(cf_tarj_banco) references banco_bd(banc_codigo),
constraint cf_tarj_marca foreign key(cf_tarj_marca) references marca_bd(marc_clave),
constraint check_tarjeta_tipo check (tarj_tipo in ('d','c'))
);

create table cheque_bd(
cheq_codigo serial,
cheq_nombre varchar(255),
cheq_numero varchar(255) not null,
cf_cheq_banco integer not null,
constraint cp_cheq_codigo primary key(cheq_codigo),
constraint cf_cheq_banco foreign key(cf_cheq_banco) references banco_bd(banc_codigo)
);

create table estatus_bd(
esta_clave serial,
esta_nombre varchar(255),
constraint cp_esta_clave primary key(esta_clave)
);

create table compra_fisica(
comp_fisc_clave serial,
cf_comp_fisc_tienda integer,
constraint cp_comp_fisc_clave primary key(comp_fisc_clave),
constraint cf_comp_fisc_tienda foreign key(cf_comp_fisc_tienda) references tienda_bd(tien_clave)
);

create table compra_bd(
comp_id serial,
comp_montotal numeric not null,
cf_comp_juridico numeric,
cf_comp_natural numeric,
cf__comp_comp_fisica integer,
constraint cp_comp_id primary key(comp_id),
constraint cf_comp_juridico foreign key(cf_comp_juridico) references juridico_bd(juri_rif),
constraint cf_comp_natural foreign key(cf_comp_natural) references natural_bd(natu_rif),
constraint cf__comp_comp_fisica foreign key(cf__comp_comp_fisica) references compra_fisica(comp_fisc_clave)
);

create table compra_estatus(
comp_esta_fechaini date,
comp_esta_fechafin date,
cf_comp_esta_compra integer not null,
cf_comp_esta_estatus integer not null,
constraint cf_comp_esta_compra foreign key(cf_comp_esta_compra) references compra_bd(comp_id),
constraint cf_comp_esta_estatus foreign key(cf_comp_esta_estatus) references estatus_bd(esta_clave)
);



create table presupuesto_producto_bd(
pre_pro_id serial,
pre_pro_cantidad numeric (255) not null,
cf_pre_pro_producto_tipo integer not null,
cf_pre_pro_presupuesto integer,
cf_pre_pro_compra integer,
constraint cp_pre_pro_id primary key(pre_pro_id),
constraint    cf_pre_pro_producto_tipo foreign key(cf_pre_pro_producto_tipo) references producto_tipo(prod_tipo_clave),
constraint cf_pre_pro_presupuesto foreign key(cf_pre_pro_presupuesto) references presupuesto_bd(pres_id),
constraint cf_pre_pro_compra foreign key(cf_pre_pro_compra) references compra_bd(comp_id)
);

CREATE TABLE mediospago(
Medi_clave serial,
cf_clie_medi_juridico numeric,
cf_clie_medi_natural numeric,
cf_clie_medi_tarjeta integer,
cf_clie_medi_cheque integer,
efecivo numeric,
Constraint cp_medi_clave primary key(medi_clave),
Constraint cf_clie_medi_juridico foreign key(cf_clie_medi_juridico) references juridico_bd(juri_rif),
Constraint cf_clie_medi_natural foreign key(cf_clie_medi_natural) references natural_bd(natu_rif),
Constraint cf_clie_medi_tarjeta foreign key(cf_clie_medi_tarjeta) references tarjeta_bd(tarj_codigo),
Constraint cf_clie_medi_cheque foreign key(cf_clie_medi_cheque) references cheque_bd(cheq_codigo)
);


create table punto_cantidad(
punt_cant_clave serial,
punt_cant_cantidad numeric,
cf_punt_cant_clie_punt integer not null,
constraint cp_punt_cant_clave primary key(punt_cant_clave),
constraint cf_punt_cant_clie_punt  foreign key(cf_punt_cant_clie_punt) references cliente_punto(clie_punt_clave)

);

create table pago_bd(
pago_codigo serial,
pago_monto numeric,
Pago_fecha date default CURRENT_DATE,
cf_pago_mediospago integer,
cf_pago_compra integer not null,
cf_pago_punt_cantidad integer,
constraint cp_pago_codigo primary key(pago_codigo),
constraint cf_pago_mediospago foreign key(cf_pago_mediospago) references mediospago(medi_clave),
constraint cf_pago_compra foreign key(cf_pago_compra) references compra_bd(comp_id),
constraint cf_pago_punt_cantidad foreign key(cf_pago_punt_cantidad) references punto_cantidad(punt_cant_clave)
 
);




create table ordenreposicion_bd(
orde_clave serial,
orde_descripcion varchar(255) not null,
orde_fecha date not null,
cf_orde_tienda integer not null,
constraint cp_orde_clave primary key(orde_clave),
constraint cf_orde_tienda foreign key(cf_orde_tienda) references tienda_bd(tien_clave)
);

create table orden_producto(
orde_proc_cantidad numeric(255),
cf_orde_proc_ordenreposicion integer not null,
cf_prod_tipo integer not null,
constraint cf_orde_proc_ordenreposicion foreign key(cf_orde_proc_ordenreposicion) references ordenreposicion_bd(orde_clave),
constraint cf_prod_tipo foreign key(cf_prod_tipo) references producto_tipo (prod_tipo_clave)
);

create table inventario_bd(
inve_cantidad numeric(255),
cf_inv_tienda integer,
cf_inv_producto_tipo integer,
constraint cf_inv_tienda foreign key(cf_inv_tienda) references tienda_bd(tien_clave),
constraint cf_inv_producto_tipo foreign key(cf_inv_producto_tipo) references producto_tipo (prod_tipo_clave)
);


create table asistencia_bd(
asis_clave serial,
asis_fecha date default CURRENT_DATE,
asis_horario_inicio time ,
asis_horario_fin time ,
cf_asis_empleado numeric,
constraint cp_asis_clave primary key(asis_clave),
constraint cf_asis_empleado foreign key (cf_asis_empleado) references empleado_bd(empl_ci)
);

create table ingrediente_bd(
ingr_clave numeric,
ingr_nombre varchar(255),
constraint cp_ingr_clave primary key(ingr_clave)
);

create table ingrediente_producto_tipo(
ingr_prod_tipo_cantidad numeric(255),
cf_ingr_prod_tipo integer,
cf_ingr_prod_tipo_ingrediente numeric,
constraint cf_ingr_prod_tipo foreign key(cf_ingr_prod_tipo) references producto_tipo(prod_tipo_clave),
constraint cf_ingr_prod_tipo_ingrediente foreign key(cf_ingr_prod_tipo_ingrediente ) references ingrediente_bd(ingr_clave)
);

