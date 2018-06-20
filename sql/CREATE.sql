create table lugar_bd (
luga_codigo serial,
luga_nombre varchar(200) not null,
luga_tipo varchar(200) not null,
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
cf_prod_tipo_producto integer,
cf_prod_tipo_tipo integer,
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

create table empleado_bd(
empl_ci numeric,
empl_nombre1 varchar(255) not null,
empl_nombre2 varchar(255),
empl_apellido1 varchar(255) not null,
empl_apellido2 varchar(255),
cf_empl_tienda integer,
constraint cp_empl_ci primary key(empl_ci),
constraint cf_empl_tienda foreign key(cf_empl_tienda) references tienda_bd(tien_clave)
);

create table usuario_bd(
usua_token varchar(255),
usua_nombre varchar(255) not null,
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

create table asistencia_bd(
asis_clave serial,
asis_fecha date not null,
asis_horario_inicio time not null,
asis_horario_fin time not null,
cf_asis_empleado numeric,
constraint cp_asis_clave primary key(asis_clave),
constraint cf_asis_empleado foreign key (cf_asis_empleado) references empleado_bd(empl_ci)
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

create table departamento_bd (
depa_clave serial,
depa_nombre varchar(255) not null,
depa_tipo varchar(255) not null,
constraint cp_depa_clave primary key(depa_clave)
);

create table departamento_tienda (
cf_depa_tien_departamento integer not null,
cf_depa_tien_tienda integer not null
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

create table tarjeta_bd
(
tarj_codigo serial,
tarj_numero varchar(255) not null,
tarj_tipo varchar(1) not null,
cf_tarj_banco integer,
constraint cp_tarj_codigo primary key(tarj_codigo),
constraint cf_tarj_banco foreign key(cf_tarj_banco) references banco_bd(banc_codigo),
constraint check_tarjeta_tipo check (tarj_tipo in ('d','c'))
);

create table cheque_bd(
cheq_codigo serial,
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

create table compra_bd(
comp_id serial,
comp_montotal numeric(255,100) not null,
cf_comp_juridico numeric,
cf_comp_natural numeric,
constraint cp_comp_id primary key(comp_id),
constraint cf_comp_juridico foreign key(cf_comp_juridico) references juridico_bd(juri_rif),
constraint cf_comp_natural foreign key(cf_comp_natural) references natural_bd(natu_rif) 
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
cf_pre_pro_presupuesto integer not null,
cf_pre_pro_compra integer not null,
constraint cp_pre_pro_id primary key(pre_pro_id),
constraint    cf_pre_pro_producto_tipo foreign key(cf_pre_pro_producto_tipo) references producto_tipo(prod_tipo_clave),
constraint cf_pre_pro_presupuesto foreign key(cf_pre_pro_presupuesto) references presupuesto_bd(pres_id),
constraint cf_pre_pro_compra foreign key(cf_pre_pro_compra) references compra_bd(comp_id)
);

create table pago_bd(
pago_codigo serial,
pago_monto numeric(255,100),
cf_pago_compra integer,
cf_pago_clie_punt integer,
constraint cp_pago_codigo primary key(pago_codigo),
constraint cf_pago_compra foreign key(cf_pago_compra) references compra_bd(comp_id),
constraint cf_pago_clie_punt foreign key(cf_pago_clie_punt) references cliente_punto(clie_punt_clave)
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

