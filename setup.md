CREATE USER 'u772401377_everland'@'%' IDENTIFIED BY 'Chinyeu@1994';
-- Tạo database
CREATE DATABASE u772401377_khSeE CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Tạo user (cho phép connect từ bất kỳ IP nào)
CREATE USER 'u772401377_everland'@'%' IDENTIFIED BY 'Chinyeu@1994';

-- Gán quyền cho DB

CREATE USER IF NOT EXISTS 'u772401377_everland'@'%' IDENTIFIED BY 'Chinyeu@1994';

GRANT ALL PRIVILEGES ON u772401377_khSeE.* TO 'u772401377_everland'@'%';
