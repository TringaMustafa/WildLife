CREATE DATABASE IF NOT EXISTS africalwildlife;

USE africalwildlife;

-- Krijo tabelën e kategorive
CREATE TABLE kategorialajmit (
    kategoriaID INT AUTO_INCREMENT PRIMARY KEY,
    emriKategoris VARCHAR(100) NOT NULL,
    pershkrimiKategoris TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Krijo tabelën e përdoruesve
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nrleternjoftimit VARCHAR(50) NOT NULL UNIQUE,
    emri VARCHAR(100) NOT NULL,
    mbiemri VARCHAR(100) NOT NULL,
    adresa VARCHAR(255),
    numri VARCHAR(15),
    passwordi VARCHAR(255) NOT NULL,
    aksesi INT DEFAULT 0, -- 0: përdorues i rregullt, 1: admin, 2: superadmin
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Krijo tabelën e lajmeve me çelësat e huaj
CREATE TABLE lajmi (
    lajmiID INT AUTO_INCREMENT PRIMARY KEY,
    titulli VARCHAR(255) NOT NULL,
    pershkrimi TEXT,
    fotolajmit VARCHAR(255),
    contentfoto VARCHAR(255),
    content TEXT,
    kategoriaID INT NOT NULL,
    user_id INT NOT NULL,
    datainsertimit TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kategoriaID) 
        REFERENCES kategorialajmit(kategoriaID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Krijo tabelën për mesazhet e kontaktit
CREATE TABLE kontaktet (
    kontaktID INT AUTO_INCREMENT PRIMARY KEY,
    emri VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subjekti VARCHAR(200),
    mesazhi TEXT NOT NULL,
    data_dergimit TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Krijo indekset
CREATE INDEX idx_lajmi_kategoria ON lajmi(kategoriaID);
CREATE INDEX idx_lajmi_user ON lajmi(user_id);
CREATE INDEX idx_user_aksesi ON users(aksesi);

-- Shto përdoruesin admin default
INSERT INTO users (nrleternjoftimit, emri, mbiemri, passwordi, aksesi)
VALUES ('admin123', 'Admin', 'User', 'admin123', 2);

-- Shto kategoritë default
INSERT INTO kategorialajmit (emriKategoris, pershkrimiKategoris)
VALUES 
('Wildlife News', 'Latest news about wildlife'),
('Conservation', 'Conservation efforts and updates'),
('Animal Stories', 'Stories about specific animals');