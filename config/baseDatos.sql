/*Con usuario administrador de la base de datos*/
create user prestashop_usuario with encrypted password '*****';
create database prestashop owner prestashop_usuario;
/*Con el usuario creado*/
create table usuarios(id_usuario serial primary key, nombre varchar(30) not null, apaterno varchar(30) not null, amaterno varchar(30) , telefono varchar(15) not null, correo varchar(40) not null, usuario varchar(20) not null, contrasenia varchar(33) not null, tipoUsuario smallint default 1);
create table tipo_usuario(idTipo serial primary key, tipo varchar(20) not null);
create table usuario_tipos(id_usuario integer not null, idTipo smallint not null, foreign key(id_usuario) references usuarios(id_usuario), foreign key(idTipo) references tipo_usuario(idTipo));
create table articulos(id_articulo serial primary key, nombre varchar(30) not null, descripcion varchar(100) not null, fotografia varchar(100) not null, existencia decimal not null, precio float not null);
create table ventas(id_venta serial primary key, id_usuario integer not null, id_articulo integer not null, cantidad decimal not null, totalVenta float not null, fecha timestamp without time zone default (now() at time zone 'utc'));
alter sequence usuarios_id_usuario_seq owner to prestashop_usuario;
alter sequence ventas_id_venta_seq owner to prestashop_usuario;
alter sequence articulos_id_articulo_seq owner to prestashop_usuario;
alter sequence tipo_usuario_idtipo_seq owner to prestashop_usuario;
INSERT INTO tipo_usuario(tipo) VALUES('Cliente');
create or replace function audit() returns trigger as $body$begininsert into usuario_tipos(id_usuario, idTipo) values(new.id_usuario, new.tipoUsuario);return new;end;$body$ language plpgsql;
create trigger actualizacion after insert on usuarios for each row execute procedure audit();

