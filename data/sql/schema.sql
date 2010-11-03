CREATE TABLE i_store_address (id BIGINT AUTO_INCREMENT, customer_id BIGINT NOT NULL, street VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zipcode BIGINT NOT NULL, country VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX customer_id_idx (customer_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE i_store_brand (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE i_store_category (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, parent_category_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX i_store_category_sluggable_idx (slug), INDEX parent_category_id_idx (parent_category_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE i_store_comment (id BIGINT AUTO_INCREMENT, item_id BIGINT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, note BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX item_id_idx (item_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE i_store_credit_card (id BIGINT AUTO_INCREMENT, number VARCHAR(255) NOT NULL, type BIGINT NOT NULL, expiry_date DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE i_store_customer (id BIGINT AUTO_INCREMENT, user_id BIGINT, telephone VARCHAR(255) NOT NULL, civility BIGINT NOT NULL, date_of_birth DATE NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE i_store_item (id BIGINT AUTO_INCREMENT, category_id BIGINT NOT NULL, brand_id BIGINT NOT NULL, name VARCHAR(255) NOT NULL UNIQUE, image VARCHAR(255) NOT NULL, short_description VARCHAR(255) NOT NULL, description TEXT NOT NULL, details TEXT NOT NULL, unit_cost FLOAT(18, 2) NOT NULL, weight FLOAT(18, 2) NOT NULL, is_activated TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), INDEX brand_id_idx (brand_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE i_store_order (id BIGINT AUTO_INCREMENT, credit_card_id BIGINT, address_id BIGINT NOT NULL, date DATE NOT NULL, payment BIGINT NOT NULL, is_validated TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX address_id_idx (address_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE i_store_order_line (id BIGINT AUTO_INCREMENT, order_id BIGINT NOT NULL, item_id BIGINT NOT NULL, quantity BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX order_id_idx (order_id), INDEX item_id_idx (item_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_profile (id BIGINT AUTO_INCREMENT, user_id BIGINT, telephone VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, date_of_birth DATE NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE i_store_address ADD CONSTRAINT i_store_address_customer_id_i_store_customer_id FOREIGN KEY (customer_id) REFERENCES i_store_customer(id);
ALTER TABLE i_store_category ADD CONSTRAINT i_store_category_parent_category_id_i_store_category_id FOREIGN KEY (parent_category_id) REFERENCES i_store_category(id);
ALTER TABLE i_store_comment ADD CONSTRAINT i_store_comment_item_id_i_store_item_id FOREIGN KEY (item_id) REFERENCES i_store_item(id);
ALTER TABLE i_store_customer ADD CONSTRAINT i_store_customer_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE i_store_item ADD CONSTRAINT i_store_item_category_id_i_store_category_id FOREIGN KEY (category_id) REFERENCES i_store_category(id);
ALTER TABLE i_store_item ADD CONSTRAINT i_store_item_brand_id_i_store_brand_id FOREIGN KEY (brand_id) REFERENCES i_store_brand(id);
ALTER TABLE i_store_order ADD CONSTRAINT i_store_order_address_id_i_store_address_id FOREIGN KEY (address_id) REFERENCES i_store_address(id);
ALTER TABLE i_store_order_line ADD CONSTRAINT i_store_order_line_order_id_i_store_order_id FOREIGN KEY (order_id) REFERENCES i_store_order(id);
ALTER TABLE i_store_order_line ADD CONSTRAINT i_store_order_line_item_id_i_store_item_id FOREIGN KEY (item_id) REFERENCES i_store_item(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_profile ADD CONSTRAINT sf_guard_user_profile_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
