ALTER TABLE Natural_BD ADD constraint cp_natu_rif primary key (natu_rif);
ALTER TABLE Natural_BD ADD constraint cf_natu_lugar foreign key (cf_natu_lugar);
ALTER TABLE Natural_BD ADD constraint cf_natu_usuario foreign key (cf_natu_usuario);
ALTER TABLE Natural_BD ADD constraint cf_natu_punto foreign key (cf_natu_punto);

