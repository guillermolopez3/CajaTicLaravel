INSERT INTO `activities` (`id`, `name`, `activo`) VALUES
(1, 'General', 1),
(2, 'Video', 1),
(3, 'Audio', 1),
(4, 'Pdf', 1);

INSERT INTO `seccions` (`id`, `name`, `activo`) VALUES
(1, 'PD', 1),
(2, 'CI', 1),
(3, 'NE', 1),
(4, 'Recursos', 1),
(5, 'Nodevades', 1),
(6, 'YouTube', 1);



INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `copete`, `image`, `tags`, 
	`id_tipo_activity`, `description`, `link`,`activo`) VALUES
(1, '2018-02-13 03:00:00', '2018-02-14 03:56:10', 'PLANIED - Orientaciones padagógicas',
 'Esta publicación, que forma parte de la colección «Marcos pedagógicos PLANIED»,
  incluye objetivos, abordaje y lineamientos del plan.', 
  'http://www.igualdadycalidadcba.gov.ar/CajaTIC/img/planied_compet.png', 
  '#Primaria #Secundaria',4,
  'Los lineamientos pedagógicos se proponen como orientaciones para promover la construcción de dispositivos transversales de innovación pedagógica, que ayuden a construir los cambios en la educación que demandan los modos emergentes de cultura y comunicación del siglo XXI. Representados en diez dimensiones, son un recorte de una multiplicidad de aspectos que plantea el desafío de pensar la escuela como un espacio de encuentro con la cultura digital.',
  'http://www.igualdadycalidadcba.gov.ar/CajaTIC/pdf/Orientaciones-05.pdf', 1);


INSERT INTO `seccion_posts` (`id`, `id_post`, `id_seccion`) VALUES
(1, 1, 4);

