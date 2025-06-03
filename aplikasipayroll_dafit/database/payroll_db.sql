create database payroll_db

CREATE TABLE users (
    id INT PRIMARY key AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100),
    role ENUM('admin', 'staff') DEFAULT 'staff'
);


CREATE TABLE perusahaan (
    id INT PRIMARY key AUTO_INCREMENT,
    nama VARCHAR(100),
    alamat TEXT,
    no_telpon VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE karyawan (
    kode_karyawan INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    alamat TEXT,
    jabatan VARCHAR(50),
    no_telp VARCHAR(20),
    email VARCHAR(100),
    no_rekening VARCHAR(30),
    rek_bank VARCHAR(50),
    id INT,
    FOREIGN KEY (id) REFERENCES perusahaan(id)
);


CREATE TABLE slip_gaji (
    no_ref INT PRIMARY KEY AUTO_INCREMENT,
    tgl DATE,
    total_gaji DECIMAL(15,2),
    kode_karyawan INT, -- Harus disesuaikan juga
    FOREIGN KEY (kode_karyawan) REFERENCES karyawan(kode_karyawan)
);


CREATE TABLE keterangan_gaji (
    no INT PRIMARY key AUTO_INCREMENT,
    keterangan TEXT,
    debitkredit ENUM('debit', 'kredit')
);

CREATE TABLE detail_gaji (
    no INT,
    no_ref INT,
    nominal DECIMAL(15,2),
    PRIMARY KEY (no, no_ref),
    FOREIGN KEY (no) REFERENCES keterangan_gaji(no),
    FOREIGN KEY (no_ref) REFERENCES slip_gaji(no_ref)
);

-- Admin
INSERT INTO users (username, password, nama, role) VALUES
('admin1', '123', 'Administrator', 'admin');

-- Staff 1
INSERT INTO users (username, password, nama, role) VALUES
('staff1', '123', 'Staff Satu', 'staff');

-- Staff 2
INSERT INTO users (username, password, nama, role) VALUES
('staff2', '123', 'Staff Dua', 'staff');

-- Admin
INSERT INTO users (username, password, nama, role) VALUES
('admin', '$2y$10$u2mI0DEKmij79kJ6r1Yqpe2TY0KKDUDa99aX1ZV9T7n0Yvv2JcMye', 'Administrator', 'admin');

-- Staff 1
INSERT INTO users (username, password, nama, role) VALUES
('staff1', '$2y$10$Q1ZGi6WnbmkzvQ0T6qNglOBXSK1Um0zKhZrNGyf99QpV5BO0YVoUe', 'Staff Satu', 'staff');

-- Staff 2
INSERT INTO users (username, password, nama, role) VALUES
('staff2', '$2y$10$Mxt7DqS8B0YhB0q8C.y/NOaIbdDwBnm7BtxHGuwhqAnLrKa3bB6D.', 'Staff Dua', 'staff');



INSERT INTO perusahaan (nama, alamat, no_telpon, email) VALUES
('PT Maju Jaya', 'Jl. Merdeka No.1, Jakarta', '021-1234567', 'info@majujaya.co.id'),
('CV Sukses Bersama', 'Jl. Sudirman No.2, Bandung', '022-7654321', 'contact@suksesbersama.co.id');


INSERT INTO karyawan (nama, alamat, jabatan, no_telp, email, no_rekening, rek_bank, id) VALUES
('Andi Prasetyo', 'Jl. Kenanga No.5, Jakarta', 'Staff IT', '081234567890', 'andi@majujaya.co.id', '1234567890', 'BCA', 1),
('Siti Aisyah', 'Jl. Mawar No.10, Jakarta', 'HRD', '082345678901', 'siti@majujaya.co.id', '2345678901', 'Mandiri', 1),
('Rudi Hartono', 'Jl. Melati No.7, Bandung', 'Marketing', '083456789012', 'rudi@suksesbersama.co.id', '3456789012', 'BRI', 2),
('Linda Kusuma', 'Jl. Flamboyan No.9, Bandung', 'Finance', '084567890123', 'linda@suksesbersama.co.id', '4567890123', 'BNI', 2),
('Budi Santoso', 'Jl. Cemara No.3, Jakarta', 'Admin', '085678901234', 'budi@majujaya.co.id', '5678901234', 'CIMB', 1);


INSERT INTO keterangan_gaji (keterangan, debitkredit) VALUES
('Gaji Pokok', 'debit'),
('Tunjangan Makan', 'debit'),
('Tunjangan Transport', 'debit'),
('Potongan BPJS', 'kredit'),
('Potongan Keterlambatan', 'kredit');


INSERT INTO slip_gaji (tgl, total_gaji, kode_karyawan) VALUES
('2025-06-01', 5500000.00, 1),
('2025-06-01', 6000000.00, 2),
('2025-06-01', 4500000.00, 3),
('2025-06-01', 7000000.00, 4),
('2025-06-01', 4800000.00, 5);


-- Slip Gaji Andi (kode_karyawan = 1, no_ref = 1)
INSERT INTO detail_gaji (no, no_ref, nominal) VALUES
(1, 1, 5000000.00),
(2, 1, 300000.00),
(4, 1, 200000.00);

-- Slip Gaji Siti (kode_karyawan = 2, no_ref = 2)
INSERT INTO detail_gaji (no, no_ref, nominal) VALUES
(1, 2, 5200000.00),
(2, 2, 400000.00),
(3, 2, 400000.00);

-- Slip Gaji Rudi (kode_karyawan = 3, no_ref = 3)
INSERT INTO detail_gaji (no, no_ref, nominal) VALUES
(1, 3, 4000000.00),
(3, 3, 300000.00),
(5, 3, 200000.00);

-- Slip Gaji Linda (kode_karyawan = 4, no_ref = 4)
INSERT INTO detail_gaji (no, no_ref, nominal) VALUES
(1, 4, 6000000.00),
(2, 4, 500000.00),
(4, 4, 500000.00);

-- Slip Gaji Budi (kode_karyawan = 5, no_ref = 5)
INSERT INTO detail_gaji (no, no_ref, nominal) VALUES
(1, 5, 4200000.00),
(2, 5, 300000.00),
(5, 5, 300000.00);


drop database payroll_db

drop table users
