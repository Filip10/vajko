-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS vaiicko_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Use the created database
USE vaiicko_db;

-- Create tables
CREATE TABLE cesties (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       cesta VARCHAR(255) NOT NULL
);

CREATE TABLE dialnices (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           nazov VARCHAR(255) NOT NULL,
                           zaciatokVystavby INT NOT NULL,
                           koniecVystavby INT NULL,
                           trasa VARCHAR(255) NOT NULL,
                           kmDokoncene DECIMAL(10, 1) NULL,
                           kmVoVystavbe DECIMAL(10, 1) NULL,
                           kmVPlane DECIMAL(10, 1) NULL
);

CREATE TABLE posts (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       nazov VARCHAR(255) NOT NULL,
                       popis VARCHAR(255) NOT NULL,
                       datumPublikovania DATE NOT NULL,
                       zdroj VARCHAR(255) NOT NULL
);

CREATE TABLE prepojenie_cesty_posts (
                                        id INT AUTO_INCREMENT PRIMARY KEY,
                                        id_posts INT NOT NULL,
                                        id_cesty INT NOT NULL,
                                        CONSTRAINT prepojenie_cesty_posts_cesty_id_fk
                                            FOREIGN KEY (id_cesty) REFERENCES cesties (id),
                                        CONSTRAINT prepojenie_cesty_posts_posts_id_fk
                                            FOREIGN KEY (id_posts) REFERENCES posts (id)
);

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       name VARCHAR(255) NOT NULL,
                       email VARCHAR(255) NOT NULL,
                       password VARCHAR(255) NOT NULL
);

-- Insert data
INSERT INTO cesties (cesta) VALUES
                              ('I/66'),
                              ('II/540'),
                              ('I/16'),
                              ('I/72'),
                              ('II/531');

INSERT INTO dialnices (nazov, zaciatokVystavby, koniecVystavby, trasa, kmDokoncene, kmVoVystavbe, kmVPlane) VALUES
                                                                                                                ('D1', 1972, 0, 'Bratislava - Košice - Vyšné Nemecké [SK-UA]', 395.9, 28.4, 87.7),
                                                                                                                ('D2', 1969, 2003, 'Kúty [CZ-SK] - Bratislava [SK-HU]', 80.5, 0.0, 0.0),
                                                                                                                ('D3', 1996, 0, 'Žilina - Skalité [SK-PL]', 37.1, 0.0, 22.0),
                                                                                                                ('D4', 1996, 0, 'Jarovce [AT-SK] - Devínska Nová Ves [SK-AT]', 32.0, 0.0, 16.0);

INSERT INTO posts (nazov, popis, datumPublikovania, zdroj) VALUES
                                                               ('Vyskytli sa aj komplikácie: Takto prebieha rekonštrukcia horského priechodu Vernár',
                                                                'Aj napriek komplikáciám, ktoré sa počas výstavby vyskytli, sa harmonogram prác na predmetnej stavbe darí dodržiavať.',
                                                                '2023-10-24',
                                                                'https://poprad.dnes24.sk/vyskytli-sa-aj-komplikacie-takto-prebieha-rekonstrukcia-horskeho-priechodu-vernar-foto-440664'),
                                                               ('Príprava obchvatu Veľkej Lomnice pokračuje, kraj ide vykupovať pozemky',
                                                                'Výstavbu chcú začať v roku 2024.',
                                                                '2023-10-12',
                                                                'https://spis.korzar.sme.sk/c/23235295/priprava-obchvatu-velkej-lomnice-pokracuje-kraj-ide-vykupovat-pozemky.html'),
                                                               ('Práce na výstavbe kruhového objazdu na Sobôtke začnú už budúci týždeň. Dôvodom ich zdržania bolo dopravné značenie',
                                                                'Rimavská Sobota sa čoskoro dočká kruhového objazdu na Sobôtke. Práce na najfrekventovanejšej križovatke v meste sa začnú už budúci týždeň.',
                                                                '2023-08-02',
                                                                'https://www.rimava.sk/spravy-z-regionu/prace-na-vystavbe-kruhoveho-objazdu-na-sobotke-zacnu-uz-buduci-tyzden-dovodom-ich-zdrzania-bolo-dopravne-znacenie/');

INSERT INTO prepojenie_cesty_posts (id_posts, id_cesty) VALUES
                                                            (1, 1),
                                                            (2, 1),
                                                            (2, 2),
                                                            (3, 3),
                                                            (3, 4),
                                                            (3, 5);
