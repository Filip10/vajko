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
INSERT INTO cesties (id, cesta) VALUES
                                    (1, 'D1'),
                                    (2, 'D2'),
                                    (3, 'D3'),
                                    (4, 'D4'),
                                    (11, 'R1'),
                                    (12, 'R2'),
                                    (13, 'R3'),
                                    (14, 'R4'),
                                    (15, 'R5'),
                                    (16, 'R6'),
                                    (17, 'R7'),
                                    (18, 'R8'),
                                    (20, 'Železnica'),
                                    (21, 'Obchvaty'),
                                    (22, 'Mosty'),
                                    (23, 'MHD'),
                                    (24, 'Cyklochodníky'),
                                    (101, 'I/2'),
                                    (102, 'I/9'),
                                    (103, 'I/10'),
                                    (104, 'I/11'),
                                    (105, 'I/11A'),
                                    (106, 'I/12'),
                                    (107, 'I/13'),
                                    (108, 'I/14'),
                                    (109, 'I/15'),
                                    (110, 'I/16'),
                                    (111, 'I/17'),
                                    (112, 'I/18'),
                                    (113, 'I/19'),
                                    (114, 'I/20'),
                                    (115, 'I/21'),
                                    (116, 'I/35'),
                                    (117, 'I/49'),
                                    (118, 'I/49A'),
                                    (119, 'I/51'),
                                    (120, 'I/54'),
                                    (121, 'I/57'),
                                    (122, 'I/59'),
                                    (123, 'I/60'),
                                    (124, 'I/61'),
                                    (125, 'I/61A'),
                                    (126, 'I/62'),
                                    (127, 'I/63'),
                                    (128, 'I/64'),
                                    (129, 'I/64A'),
                                    (130, 'I/65'),
                                    (131, 'I/65D'),
                                    (132, 'I/66'),
                                    (133, 'I/66A'),
                                    (134, 'I/67'),
                                    (135, 'I/68'),
                                    (136, 'I/69'),
                                    (137, 'I/70'),
                                    (138, 'I/71'),
                                    (139, 'I/72'),
                                    (140, 'I/74'),
                                    (141, 'I/74A'),
                                    (142, 'I/74B'),
                                    (143, 'I/75'),
                                    (144, 'I/75A'),
                                    (145, 'I/76'),
                                    (146, 'I/77'),
                                    (147, 'I/77A'),
                                    (148, 'I/78'),
                                    (149, 'I/79'),
                                    (150, 'I/79A'),
                                    (151, 'I/80'),
                                    (201, 'II/127'),
                                    (202, 'II/143'),
                                    (203, 'II/211'),
                                    (204, 'II/425'),
                                    (205, 'II/426'),
                                    (206, 'II/428'),
                                    (207, 'II/484'),
                                    (208, 'II/487'),
                                    (209, 'II/499'),
                                    (210, 'II/500'),
                                    (211, 'II/501'),
                                    (212, 'II/502'),
                                    (213, 'II/503'),
                                    (214, 'II/504'),
                                    (215, 'II/505'),
                                    (216, 'II/506'),
                                    (217, 'II/507'),
                                    (218, 'II/509'),
                                    (219, 'II/510'),
                                    (220, 'II/511'),
                                    (221, 'II/512'),
                                    (222, 'II/513'),
                                    (223, 'II/514'),
                                    (224, 'II/515'),
                                    (225, 'II/516'),
                                    (226, 'II/517'),
                                    (227, 'II/519'),
                                    (228, 'II/520'),
                                    (229, 'II/524'),
                                    (230, 'II/526'),
                                    (231, 'II/527'),
                                    (232, 'II/527A'),
                                    (233, 'II/527B'),
                                    (234, 'II/529'),
                                    (235, 'II/531'),
                                    (236, 'II/532'),
                                    (237, 'II/533'),
                                    (238, 'II/534'),
                                    (239, 'II/535'),
                                    (240, 'II/536'),
                                    (241, 'II/536A'),
                                    (242, 'II/537'),
                                    (243, 'II/538'),
                                    (244, 'II/539'),
                                    (245, 'II/540'),
                                    (246, 'II/541'),
                                    (247, 'II/542'),
                                    (248, 'II/543'),
                                    (249, 'II/545'),
                                    (250, 'II/546'),
                                    (251, 'II/547'),
                                    (252, 'II/548'),
                                    (253, 'II/549'),
                                    (254, 'II/550'),
                                    (255, 'II/552'),
                                    (256, 'II/554'),
                                    (257, 'II/555'),
                                    (258, 'II/556'),
                                    (259, 'II/558'),
                                    (260, 'II/558A'),
                                    (261, 'II/559'),
                                    (262, 'II/560'),
                                    (263, 'II/561'),
                                    (264, 'II/562'),
                                    (265, 'II/563'),
                                    (266, 'II/564'),
                                    (267, 'II/566'),
                                    (268, 'II/567'),
                                    (269, 'II/571'),
                                    (270, 'II/572'),
                                    (271, 'II/573'),
                                    (272, 'II/574'),
                                    (273, 'II/574A'),
                                    (274, 'II/575'),
                                    (275, 'II/576'),
                                    (276, 'II/578'),
                                    (277, 'II/579'),
                                    (278, 'II/580'),
                                    (279, 'II/581'),
                                    (280, 'II/582'),
                                    (281, 'II/583'),
                                    (282, 'II/583A'),
                                    (283, 'II/584'),
                                    (284, 'II/584A'),
                                    (285, 'II/585'),
                                    (286, 'II/587'),
                                    (287, 'II/588'),
                                    (288, 'II/589'),
                                    (289, 'II/590'),
                                    (290, 'II/591'),
                                    (291, 'II/592'),
                                    (292, 'II/593'),
                                    (293, 'II/594'),
                                    (294, 'II/595');


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
