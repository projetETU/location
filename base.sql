CREATE TABLE admin
(
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(255) UNIQUE,
    password TEXT
);
CREATE TABLE proprietaire
(
    id_proprietaire INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    numero  VARCHAR(255) UNIQUE
);
CREATE TABLE clients
(
	id_clients INT AUTO_INCREMENT PRIMARY KEY,
     nom VARCHAR(255),
	 email  VARCHAR(255) UNIQUE
);
CREATE TABLE type_biens 
(
	id_type_biens INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(255) UNIQUE,
     commission FLOAT
);
CREATE TABLE region 
(
	id_region INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);
INSERT INTO region (name)
VALUES 
    ('Alaotra-Mangoro'),
    ('Amoron\'i Mania'),
    ('Analamanga'),
    ('Analanjirofo'),
    ('Androy'),
    ('Anosy'),
    ('Atsimo-Andrefana'),
    ('Atsimo-Atsinanana'),
    ('Atsinanana'),
    ('Betsiboka'),
    ('Boeny'),
    ('Bongolava'),
    ('Diana'),
    ('Haute Matsiatra'),
    ('Ihorombe'),
    ('Itasy'),
    ('Melaky'),
    ('Menabe'),
    ('Sava'),
    ('Sofia'),
    ('Vakinankaratra'),
    ('Vatovavy-Fitovinany');
	CREATE TABLE biens 
	(
		id_biens INT AUTO_INCREMENT PRIMARY KEY,
        reference VARCHAR(255),
		name VARCHAR(255),
		description TEXT ,
		region INT ,
		loyer FLOAT ,
		proprietaire INT ,
        type_bien INT ,
        FOREIGN KEY (type_bien) REFERENCES type_biens(id_type_biens),
		FOREIGN KEY (region) REFERENCES region(id_region),
		FOREIGN KEY (proprietaire) REFERENCES proprietaire(id_proprietaire)
	);



CREATE TABLE photos
(
	id_photo INT AUTO_INCREMENT PRIMARY KEY,
    path_photo VARCHAR(255) UNIQUE ,
    biens INT ,
	FOREIGN KEY (biens) REFERENCES biens(id_biens)
);
CREATE TABLE locations
(
	id_location INT AUTO_INCREMENT PRIMARY KEY,
    client INT ,
    biens INT ,
    duree INT ,
    debut DATE  ,
    FOREIGN KEY (biens) REFERENCES biens(id_biens),
    FOREIGN KEY (client) REFERENCES clients(id_clients)
);
CREATE TABLE location_details 
(
    biens VARCHAR(255) ,
    clients VARCHAR(255),
    mois DATE ,
    commission FLOAT ,
	num_mois INT ,
    loyer FLOAT ,
    proprio INT ,
    gainProprio FLOAT ,
    valeurCommission FLOAT 
);



SELECT 
    clients, 
    mois,  
    loyer,
    CASE 
        WHEN mois < CURRENT_DATE THEN 'payer'
        ELSE 'à payer'
    END AS status
FROM location_details 
WHERE 
;

CREATE OR REPLACE VIEW v_locations AS 
	SELECT 
    locations.id_location ,
    biens.reference AS reff ,
    clients.email AS client 
    FROM locations 
    JOIN biens ON  locations.biens = biens.id_biens
    JOIN clients ON  locations.client = clients.id_clients;
			

-- SELECT 
--     DATE_FORMAT(debut, '%Y-%m') AS month,
--     SUM(Loyer) AS gainParMois
-- FROM
--     locations
-- WHERE 
--     YEAR(debut) = 2024
--     AND MONTH(debut) BETWEEN 3 AND 6
-- GROUP BY
--     DATE_FORMAT(debut, '%Y-%m');


