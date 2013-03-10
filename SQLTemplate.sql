CREATE TABLE nilai_ekstrakurikuler (predikat varchar(15), id_rapor int(10) DEFAULT 0 NOT NULL, id_ekstrakurikuler int(10) DEFAULT '' NOT NULL, PRIMARY KEY (id_rapor, id_ekstrakurikuler)) type=InnoDB;
ALTER TABLE nilai_ekstrakurikuler ADD INDEX FKFDF42E0C2E42CC3A (id_ekstrakurikuler), ADD CONSTRAINT FKFDF42E0C2E42CC3A FOREIGN KEY (id_ekstrakurikuler) REFERENCES ekstrakurikuler (id) ON UPDATE No action ON DELETE No action;
ALTER TABLE nilai_ekstrakurikuler ADD INDEX FKFDF42E0C5852C04B (id_rapor), ADD CONSTRAINT FKFDF42E0C5852C04B FOREIGN KEY (id_rapor) REFERENCES rapor (id) ON UPDATE No action ON DELETE No action;
CREATE UNIQUE INDEX username ON guru ()'
Error 'Duplicate key name 'nis'' when executing 'CREATE UNIQUE INDEX nis ON siswa (nis)'
Setting Quote SQL Identifier option to Auto or Yes may solve this problem.
Generate database finish...