create table vaiicko_db.cesty
(
    id    int auto_increment
        primary key,
    cesta varchar(255) not null
);

create table vaiicko_db.dialnices
(
    nazov            varchar(255)   not null,
    zaciatokVystavby int            not null,
    koniecVystavby   int            null,
    trasa            varchar(255)   not null,
    kmDokoncene      decimal(10, 1) null,
    kmVoVystavbe     decimal(10, 1) null,
    kmVPlane         decimal(10, 1) null,
    id               int auto_increment
        primary key
);

create table vaiicko_db.posts
(
    id                int auto_increment
        primary key,
    nazov             varchar(255) not null,
    popis             varchar(255) not null,
    datumPublikovania date         not null,
    zdroj             varchar(255) not null
);

create table vaiicko_db.prepojenie_cesty_posts
(
    id       int auto_increment
        primary key,
    id_posts int not null,
    id_cesty int not null,
    constraint prepojenie_cesty_posts_cesty_id_fk
        foreign key (id_cesty) references vaiicko_db.cesty (id),
    constraint prepojenie_cesty_posts_posts_id_fk
        foreign key (id_posts) references vaiicko_db.posts (id)
);

create table vaiicko_db.users
(
    id       int auto_increment
        primary key,
    name     varchar(255) not null,
    email    varchar(255) not null,
    password varchar(255) not null
);

INSERT INTO vaiicko_db.prepojenie_cesty_posts (id, id_posts, id_cesty) VALUES (1, 1, 1);
INSERT INTO vaiicko_db.prepojenie_cesty_posts (id, id_posts, id_cesty) VALUES (2, 2, 1);
INSERT INTO vaiicko_db.prepojenie_cesty_posts (id, id_posts, id_cesty) VALUES (3, 2, 2);
INSERT INTO vaiicko_db.prepojenie_cesty_posts (id, id_posts, id_cesty) VALUES (4, 3, 3);
INSERT INTO vaiicko_db.prepojenie_cesty_posts (id, id_posts, id_cesty) VALUES (5, 3, 4);
INSERT INTO vaiicko_db.prepojenie_cesty_posts (id, id_posts, id_cesty) VALUES (6, 3, 5);

INSERT INTO vaiicko_db.posts (id, nazov, popis, datumPublikovania, zdroj) VALUES (1, 'Vyskytli sa aj komplikácie: Takto prebieha rekonštrukcia horského priechodu Vernár', 'Aj napriek komplikáciám, ktoré sa počas výstavby vyskytli, sa harmonogram prác na predmetnej stavbe darí dodržiavať.', '2023-10-24', 'https://poprad.dnes24.sk/vyskytli-sa-aj-komplikacie-takto-prebieha-rekonstrukcia-horskeho-priechodu-vernar-foto-440664');
INSERT INTO vaiicko_db.posts (id, nazov, popis, datumPublikovania, zdroj) VALUES (2, 'Príprava obchvatu Veľkej Lomnice pokračuje, kraj ide vykupovať pozemky', 'Výstavbu chcú začať v roku 2024.', '2023-10-12', 'https://spis.korzar.sme.sk/c/23235295/priprava-obchvatu-velkej-lomnice-pokracuje-kraj-ide-vykupovat-pozemky.html');
INSERT INTO vaiicko_db.posts (id, nazov, popis, datumPublikovania, zdroj) VALUES (3, 'Práce na výstavbe kruhového objazdu na Sobôtke začnú už budúci týždeň. Dôvodom ich zdržania bolo dopravné značenie', 'Rimavská Sobota sa čoskoro dočká kruhového objazdu na Sobôtke. Práce na najfrekventovanejšej križovatke v meste sa začnú už budúci týždeň.', '2023-08-02', 'https://www.rimava.sk/spravy-z-regionu/prace-na-vystavbe-kruhoveho-objazdu-na-sobotke-zacnu-uz-buduci-tyzden-dovodom-ich-zdrzania-bolo-dopravne-znacenie/');

INSERT INTO vaiicko_db.dialnices (nazov, zaciatokVystavby, koniecVystavby, trasa, kmDokoncene, kmVoVystavbe, kmVPlane, id) VALUES ('D1', 1972, 0, 'Bratislava - Košice - Vyšné Nemecké [SK-UA]', 395.9, 28.4, 87.7, 1);
INSERT INTO vaiicko_db.dialnices (nazov, zaciatokVystavby, koniecVystavby, trasa, kmDokoncene, kmVoVystavbe, kmVPlane, id) VALUES ('D2', 1969, 2003, 'Kúty [CZ-SK] - Bratislava [SK-HU]', 80.5, 0.0, 0.0, 2);
INSERT INTO vaiicko_db.dialnices (nazov, zaciatokVystavby, koniecVystavby, trasa, kmDokoncene, kmVoVystavbe, kmVPlane, id) VALUES ('D3', 1996, 0, 'Žilina - Skalité [SK-PL]', 37.1, 0.0, 22.0, 3);
INSERT INTO vaiicko_db.dialnices (nazov, zaciatokVystavby, koniecVystavby, trasa, kmDokoncene, kmVoVystavbe, kmVPlane, id) VALUES ('D4', 1996, 0, 'Jarovce [AT-SK] - Devínska Nová Ves [SK-AT]', 32.0, 0.0, 16.0, 4);

INSERT INTO vaiicko_db.cesty (id, cesta) VALUES (1, 'I/66');
INSERT INTO vaiicko_db.cesty (id, cesta) VALUES (2, 'II/540');
INSERT INTO vaiicko_db.cesty (id, cesta) VALUES (3, 'I/16');
INSERT INTO vaiicko_db.cesty (id, cesta) VALUES (4, 'I/72');
INSERT INTO vaiicko_db.cesty (id, cesta) VALUES (5, 'II/531');
