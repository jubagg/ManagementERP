create TABLE mgartcodbart(
    codtid int(2) PRIMARY KEY NOT NULL,
    codtdes varchar(20)
);

create table mgartcodbar(
    codid int(2) PRIMARY KEY NOT NULL ,
    codcod varchar(13),
    coddescalt varchar(150),
    codcant int(4)
);

create table mgartfam(
    afid varchar(5) PRIMARY KEY NOT NULL,
    afdesc varchar(100),
    afabr varchar(3)
);

create table mgartneg(
    anid int(4) primary key not null,
    andesc varchar(100),
    anabr varchar(3)
);

create table mgartivacat(
    icid int(1) primary key not null,
    icdesc varchar(100),
    icabr varchar(3),
    icpor double
);

create table mgbonificaciones(
    bid int(2) primary key not null,
    bdesc varchar(100),
    babr varchar(3),
    bpor double
);

/*stock*/
create table mgarttipmed(
    tmid int(2) primary key not null,
    tmdesc varchar(100),
    tmabr varchar(3),
    tmoperar bit
);

create table mgart(
    artcod int primary key not null,
    artdesc varchar(200),
    arttipcodbar int(2),
    artcodbarun varchar(13),
    artcodcont bit,
    artcodbar int(2),
    artfam varchar(5),
    artunneg int(4),
    artiva int(1),
    artbonf int(2),
    artfecdesc date,
    artcontabc varchar,
    artcontabv varchar,
    artfeccre date,
    artfecmod datetime,
    artfecdes datetime,
    artinactive bit,
    artunmed int(2),
    artftacion  bit,
    artcontrolstk bit,
    artlimminstk double,
    artlimmaxstk double,
    artneg bit
);
