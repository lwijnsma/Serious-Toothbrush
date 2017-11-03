
CREATE TABLE album (
    id           INTEGER(5) NOT NULL,
    title        VARCHAR(250) NOT NULL,
    artist       VARCHAR(250),
    year         VARCHAR(4),
    created_at   DATE,
    updated_at   DATE
);


ALTER TABLE album ADD CONSTRAINT album_pk PRIMARY KEY ( id );
ALTER TABlE album MODIFY COLUMN id integer(5) AUTO_INCREMENT;


CREATE TABLE cart (
    created_at   DATE,
    updated_at   DATE,
    users_id     INTEGER(5) NOT NULL
);


ALTER TABLE cart ADD CONSTRAINT cart_pk PRIMARY KEY ( users_id );

CREATE TABLE cart_songs (
    cart_id      INTEGER(5) NOT NULL,
    songs_id   INTEGER(5) NOT NULL
);

ALTER TABLE cart_songs ADD CONSTRAINT cart_songs_pk PRIMARY KEY ( songs_id );

CREATE TABLE genre (
    id            INTEGER(5) NOT NULL,
    title         VARCHAR(250) NOT NULL,
    description   VARCHAR(500),
    created_at    DATE,
    updated_at    DATE
);


ALTER TABLE genre ADD CONSTRAINT genre_pk PRIMARY KEY ( id );
ALTER TABlE genre MODIFY COLUMN id integer(5) AUTO_INCREMENT;

CREATE TABLE libraries (
    title         VARCHAR(250) NOT NULL,
    description   VARCHAR(500),
    created_at    DATE,
    updated_at    DATE,
    users_id      INTEGER(5) NOT NULL
);


CREATE UNIQUE INDEX libraries__idx ON
    libraries ( users_id ASC );

ALTER TABLE libraries ADD CONSTRAINT libraries_pk PRIMARY KEY ( title,users_id );

CREATE TABLE library_songs (
    libraries_title      VARCHAR(25) NOT NULL,
    libraries_users_id   INTEGER(5) NOT NULL,
    songs_id             INTEGER(5) NOT NULL
);


ALTER TABLE library_songs ADD CONSTRAINT library_songs_pk PRIMARY KEY ( libraries_title,songs_id );


CREATE TABLE quality (
    id        INTEGER(5) NOT NULL,
    name      VARCHAR(25),
    bitrate   VARCHAR(5),
    format    VARCHAR(6)
);


ALTER TABLE quality ADD CONSTRAINT quality_pk PRIMARY KEY ( id );
ALTER TABlE quality MODIFY COLUMN id integer(5) AUTO_INCREMENT;

CREATE TABLE songs (
    id         INTEGER(5) NOT NULL,
    title        VARCHAR(250) NOT NULL,
    artiest      VARCHAR(250),
    length       VARCHAR(40),
    created_at   DATE,
    updated_at   DATE,
    album_id     INTEGER(5) NOT NULL,
    genre_id     INTEGER(5) NOT NULL,
    quality_id   INTEGER(5) NOT NULL
);


ALTER TABLE songs ADD CONSTRAINT songs_pk PRIMARY KEY ( id);
ALTER TABlE songs MODIFY COLUMN id integer(5) AUTO_INCREMENT;

CREATE TABLE users (
    id           INTEGER(5) NOT NULL,
    username     VARCHAR(250) NOT NULL,
    email        VARCHAR(80),
    first_name   VARCHAR(55),
    last_name    VARCHAR(55),
    password     VARCHAR(64) NOT NULL,
    created_at   DATE,
    updated_at   DATE
);


ALTER TABLE users ADD CONSTRAINT users_pk PRIMARY KEY ( id );
ALTER TABlE users MODIFY COLUMN id integer(5) AUTO_INCREMENT;


ALTER TABLE cart_songs
    ADD CONSTRAINT cart_songs_cart_fk FOREIGN KEY ( cart_id )
        REFERENCES cart ( users_id );

ALTER TABLE cart_songs
    ADD CONSTRAINT cart_songs_songs_fk FOREIGN KEY ( songs_id )
        REFERENCES songs ( id );

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
    ADD CONSTRAINT library_songs_songs_fk FOREIGN KEY ( songs_id )
        REFERENCES songs ( id );

ALTER TABLE songs
    ADD CONSTRAINT songs_album_fk FOREIGN KEY ( album_id )
        REFERENCES album ( id );

ALTER TABLE songs
    ADD CONSTRAINT songs_genre_fk FOREIGN KEY ( genre_id )
        REFERENCES genre ( id );

ALTER TABLE songs
    ADD CONSTRAINT songs_quality_fk FOREIGN KEY ( quality_id )
        REFERENCES quality ( id );
