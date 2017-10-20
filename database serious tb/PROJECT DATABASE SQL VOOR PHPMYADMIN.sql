
CREATE TABLE album (
    title        VARCHAR(50) NOT NULL,
    artist       VARCHAR(15),
    year         VARCHAR(4),
    created_at   DATE,
    updated_at   DATE
);

ALTER TABLE album ADD CONSTRAINT album_pk PRIMARY KEY ( title );

CREATE TABLE cart (
    created_at   DATE,
    updated_at   DATE,
    users_id     INTEGER(5) NOT NULL
);

ALTER TABLE cart ADD CONSTRAINT cart_pk PRIMARY KEY ( users_id );

CREATE TABLE cart_songs (
    songs_title   VARCHAR(50) NOT NULL,
    cart_id       INTEGER(5) NOT NULL
);

ALTER TABLE cart_songs ADD CONSTRAINT cart_songs_pk PRIMARY KEY ( songs_title );

CREATE TABLE genre (
    title         VARCHAR(50) NOT NULL,
    description   VARCHAR(500) NOT NULL,
    created_at    DATE,
    updated_at    DATE
);

ALTER TABLE genre ADD CONSTRAINT genre_pk PRIMARY KEY ( title );

CREATE TABLE libraries (
    title         VARCHAR(25) NOT NULL,
    description   VARCHAR(250),
    created_at    DATE,
    updated_at    DATE,
    users_id      INTEGER(5) NOT NULL
);

CREATE UNIQUE INDEX libraries__idx ON
    libraries ( users_id ASC );

ALTER TABLE libraries ADD CONSTRAINT libraries_pk PRIMARY KEY ( title,users_id );

CREATE TABLE library_songs (
    songs_title          VARCHAR(50) NOT NULL,
    libraries_title      VARCHAR(25) NOT NULL,
    libraries_users_id   INTEGER(5) NOT NULL
);

ALTER TABLE library_songs
    ADD CONSTRAINT library_songs_pk PRIMARY KEY ( songs_title,libraries_title,libraries_users_id );

CREATE TABLE playlist (
    title         VARCHAR(30) NOT NULL,
    description   VARCHAR(250),
    users_id      INTEGER(5) NOT NULL
);

ALTER TABLE playlist ADD CONSTRAINT playlist_pk PRIMARY KEY ( title,users_id );

CREATE TABLE playlist_songs (
    songs_title      VARCHAR(50) NOT NULL,
    playlist_id      INTEGER(5) NOT NULL,
    playlist_title   VARCHAR(30) NOT NULL
);

ALTER TABLE playlist_songs
    ADD CONSTRAINT playlist_songs_pk PRIMARY KEY ( songs_title,playlist_title,playlist_id );

CREATE TABLE quality (
    name      VARCHAR(25) NOT NULL,
    bitrate   VARCHAR(5),
    format    VARCHAR(6)
);

ALTER TABLE quality ADD CONSTRAINT quality_pk PRIMARY KEY ( name );

CREATE TABLE songs (
    title          VARCHAR(50) NOT NULL,
    artiest        VARCHAR(50),
    length         VARCHAR(40),
    created_at     DATE,
    updated_at     DATE,
    album_title    VARCHAR(50) NOT NULL,
    genre_title    VARCHAR(50) NOT NULL,
    quality_name   VARCHAR(25) NOT NULL
);

ALTER TABLE songs ADD CONSTRAINT songs_pk PRIMARY KEY ( title );

CREATE TABLE users (
    id           INTEGER(5) NOT NULL,
    username     VARCHAR(25) BINARY NOT NULL UNIQUE,
    email        VARCHAR(50) NOT NULL,
    first_name   VARCHAR(25),
    last_name    VARCHAR(25),
    password     VARCHAR(64) NOT NULL,
    is_admin     CHAR(1),
    created_at   DATE,
    updated_at   DATE
);

ALTER TABLE users ADD CONSTRAINT users_pk PRIMARY KEY ( id );
ALTER TABlE users MODIFY COLUMN id integer(5) AUTO_INCREMENT;


ALTER TABLE cart_songs
    ADD CONSTRAINT cart_songs_cart_fk FOREIGN KEY ( cart_id )
        REFERENCES cart ( users_id );

ALTER TABLE cart_songs
    ADD CONSTRAINT cart_songs_songs_fk FOREIGN KEY ( songs_title )
        REFERENCES songs ( title );

ALTER TABLE cart
    ADD CONSTRAINT cart_users_fk FOREIGN KEY ( users_id )
        REFERENCES users ( id );

ALTER TABLE libraries
    ADD CONSTRAINT libraries_users_fk FOREIGN KEY ( users_id )
        REFERENCES users ( id );

ALTER TABLE library_songs
    ADD CONSTRAINT library_songs_libraries_fk FOREIGN KEY ( libraries_title,libraries_users_id )
        REFERENCES libraries ( title,users_id );

ALTER TABLE library_songs
    ADD CONSTRAINT library_songs_songs_fk FOREIGN KEY ( songs_title )
        REFERENCES songs ( title );

ALTER TABLE playlist_songs
    ADD CONSTRAINT playlist_songs_playlist_fk FOREIGN KEY ( playlist_title,playlist_id )
        REFERENCES playlist ( title,users_id );

ALTER TABLE playlist_songs
    ADD CONSTRAINT playlist_songs_songs_fk FOREIGN KEY ( songs_title )
        REFERENCES songs ( title );

ALTER TABLE playlist
    ADD CONSTRAINT playlist_users_fk FOREIGN KEY ( users_id )
        REFERENCES users ( id );

ALTER TABLE songs
    ADD CONSTRAINT songs_album_fk FOREIGN KEY ( album_title )
        REFERENCES album ( title );

ALTER TABLE songs
    ADD CONSTRAINT songs_genre_fk FOREIGN KEY ( genre_title )
        REFERENCES genre ( title );

ALTER TABLE songs
    ADD CONSTRAINT songs_quality_fk FOREIGN KEY ( quality_name )
        REFERENCES quality ( name );

