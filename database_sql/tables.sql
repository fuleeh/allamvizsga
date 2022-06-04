CREATE TABLE `users` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `email` varchar(255),
    `email_verified_at` timestamp,
    `password` varchar(255),
    `status` boolean default false,
    `last_visit` timestamp,
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `patient_category` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `patient_profile` (
    `user_id` int,
    `patient_category_id` int,
    `doctor_id` int DEFAULT null,
    `first_name` varchar(255),
    `last_name` varchar(255),
    `address` varchar(255),
    `phone_number` varchar(255),
    `isAccepted` boolean default false,
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `doctor_profile` (
    `user_id` int,
    `first_name` varchar(255),
    `last_name` varchar(255),
    `address` varchar(255),
    `phone_number` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

--From Roles and Permissions library
CREATE TABLE `roles` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255),
    `guard_name` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `role_has_permissions` (
    `permission_id` int,
    `role_id` int,
    PRIMARY KEY (`permission_id`, `role_id`)
);

CREATE TABLE `permissions` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255),
    `guard_name` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `model_has_roles` (
    `role_id` int,
    `model_type` varchar(255),
    `model_id` varchar(255),
    PRIMARY KEY (`role_id`, `model_type`, `model_id`)
);

CREATE TABLE `model_has_permissions` (
    `permission_id` int,
    `model_type` varchar(255),
    `model_id` varchar(255),
    PRIMARY KEY (`permission_id`, `model_type`, `model_id`)
);
--

CREATE TABLE `photos` (
    `id` int PRIMARY KEY,
    `file` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `publication_categories` (
    `id` int PRIMARY KEY,
    `name` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `publications` (
    `id` int PRIMARY KEY,
    `author_id` int,
    `publication_category_id` int,
    `photo_id` int,
    `title` varchar(255),
    `body` varchar(255),
    `status` boolean,
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `invites` (
    `id` int PRIMARY KEY,
    `user_id` int,
    `email` varchar(255),
    `role_id` int,
    `token` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `data_gathers` (
    `id` int PRIMARY KEY,
    `doctor_id` int,
    `start_date` timestamp,
    `end_date` timestamp,
    `glucose_carbs_freq` int,
    `bolus_serving_freq` int,
    `activity` boolean default true,
    `status` boolean,
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `measured_glucose` (
    `id` int PRIMARY KEY,
    `data_gathers_id` int,
    `before_meal` varchar(255),
    `after_meal` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `carbs` (
    `id` int PRIMARY KEY,
    `data_gathers_id` int,
    `amount` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `bolus_serving` (
    `id` int PRIMARY KEY,
    `data_gathers_id` int,
    `amount` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `activity` (
    `id` int PRIMARY KEY,
    `data_gathers_id` int,
    `type` varchar(255),
    `length` varchar(255),
    `intensity` varchar(255),
    `burned_kcal` varchar(255),
    `created_at` timestamp,
    `updated_at` timestamp
);

CREATE TABLE `medications` (
    `id` int PRIMARY KEY,
    `user_id` int,
    `type` varchar(255),
    `name` varchar(255),
    `amount_in_mg` varchar(255),
    `frequency` int,
    `created_at` timestamp,
    `updated_at` timestamp
);

ALTER TABLE `patient_profile` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `patient_profile` ADD FOREIGN KEY (`doctor_id`) REFERENCES `doctor_profile` (`user_id`);

ALTER TABLE `patient_profile` ADD FOREIGN KEY (`patient_category_id`) REFERENCES `patient_category` (`id`);

ALTER TABLE `doctor_profile` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `invites` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `publications` ADD FOREIGN KEY (`author_id`) REFERENCES `doctor_profile` (`user_id`);

ALTER TABLE `publications` ADD FOREIGN KEY (`publication_category_id`) REFERENCES `publication_categories` (`id`);

ALTER TABLE `publications` ADD FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`);

ALTER TABLE `data_gathers` ADD FOREIGN KEY (`doctor_id`) REFERENCES `doctor_profile` (`user_id`);

ALTER TABLE `measured_glucose` ADD FOREIGN KEY (`data_gathers_id`) REFERENCES `data_gathers` (`id`);

ALTER TABLE `carbs` ADD FOREIGN KEY (`data_gathers_id`) REFERENCES `data_gathers` (`id`);

ALTER TABLE `bolus_serving` ADD FOREIGN KEY (`data_gathers_id`) REFERENCES `data_gathers` (`id`);

ALTER TABLE `activity` ADD FOREIGN KEY (`data_gathers_id`) REFERENCES `data_gathers` (`id`);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `medications` (`user_id`);

