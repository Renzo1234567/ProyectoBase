CREATE DB candy_ucab;

CREATE TABLE Natural_BD (
    natu_rif     number(11),
    natu_correo  varchar(255),
    natu_cedula  number(11) NOT NULL UNIQUE,
    natu_nombre_1    varchar(255) NOT NULL,
    natu_nombre_2    varchar(255),
    natu_apellido_1  varchar(255) NOT NULL,
    natu_apellido_2  varchar(255),
    cf_natu_lugar    number(11) NOT NULL,
    cf_natu_usuario  number(11),
    cf_natu_punto  number(11),
); 