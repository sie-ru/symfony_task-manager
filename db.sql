create table users(
    user_id bigserial primary key,
    user_name varchar(255) not null unique,
    user_password varchar(255) not null,
    user_email varchar(255) default null unique,
    user_verified boolean default false,
    user_image varchar(255) default null,
    telegramid varchar(255) default null,
    role_id serial
);

create table roles(
    role_id serial primary key,
    role_name varchar(255) unique not null
);

create table projects(
    project_id bigserial primary key,
    project_name varchar(255) unique not null,
    project_description varchar(1000) default null
);

create table tasks(
    task_id bigserial primary key,
    task_key varchar(255) not null unique,
    task_title varchar(255) not null,
    task_description varchar(1500) default null,
    is_completed boolean default false,
    created_at timestamp not null,
    project_id bigserial,
    user_id bigserial,
    type_id bigserial,
    status_id bigserial,
    CONSTRAINT fk_project_id FOREIGN KEY(project_id) REFERENCES projects (project_id)
);

create table task_files(
    file_id bigserial primary key,
    file_path varchar(500) not null,
    task_id bigserial,
    CONSTRAINT fk_task_id FOREIGN KEY(task_id) REFERENCES tasks (task_id) ON DELETE CASCADE
);

create table task_types(
    type_id serial primary key,
    type_name varchar(100) unique not null
);

create table task_statuses(
    status_id serial primary key,
    status_name varchar(100) unique not null
);

create table task_priority(
    priority_id serial primary key,
    priority_name varchar(100) unique not null
);

create table comments(
    comment_id bigserial primary key,
    comment_text varchar(1000) not null,
    created_at timestamp not null,
    task_id bigserial,
    user_id bigserial,
    CONSTRAINT fk_task_id FOREIGN KEY (task_id) REFERENCES tasks (task_id) ON DELETE CASCADE,
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE
);

