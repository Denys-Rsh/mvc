create table pages
(
    id          int auto_increment
        primary key,
    friendly    varchar(200) null,
    title       varchar(200) null,
    description varchar(200) null
);

INSERT INTO app.pages (id, friendly, title, description) VALUES (1, '', 'Title One', '');
INSERT INTO app.pages (id, friendly, title, description) VALUES (2, '', 'Title Two', '');
