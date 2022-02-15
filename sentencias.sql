drop database if exists registro;
create database registro;
use registro;

drop table if exists usuarios;
create table usuarios
(
    id             int auto_increment
        primary key,
    nombre_usuario varchar(100) null,
    email          varchar(50)  null,
    contraseña     varchar(50)  null,
    enlace_foto    varchar(50)  null
);
insert into usuarios(nombre_usuario,contraseña) values ('admin','admin');

create procedure insertar(IN usuarioss varchar(100),IN correo varchar(50),IN password varchar(50),IN enlace varchar(50))
begin
    insert into usuarios(nombre_usuario, email, contraseña, enlace_foto) VALUES (usuarioss,correo,password,enlace);
end;

create procedure eliminar(IN id1 int)
begin
    delete from usuarios where id = id1;
end;


create procedure comprobarDatos(IN password varchar(50),IN nombre varchar(100))
begin
    select contraseña from usuarios where nombre_usuario = nombre and contraseña=password;
end;

create procedure obtenerDatos(IN usuario varchar(100))
begin
    select * from usuarios where nombre_usuario=usuario;
end;

create procedure obtenerDatosAdmin()
begin
    select * from usuarios;
end;
create procedure obtenerNombre(IN id1 int)
begin
    select nombre_usuario from usuarios where id=id1;
end;

create procedure cambiarNombre(IN nombre varchar(50),IN id1 int)
begin
    update usuarios set nombre_usuario = nombre where id=id1;
end;

create procedure obtenerID(IN nombre varchar(50))
begin
    select id from usuarios where nombre_usuario = nombre;
end;
create procedure cambiarpassword(IN id1 int,In pass varchar(50))
begin
    update usuarios set contraseña = pass where id=id1;
end;

create procedure cambiarCorreo(IN id1 int,IN correo varchar(50))
begin
    update usuarios set email = correo where id=id1;
end;
create procedure cambiarURL(IN id1 int,IN url varchar(50))
begin
    update usuarios set enlace_foto = url where id=id1;
end;
