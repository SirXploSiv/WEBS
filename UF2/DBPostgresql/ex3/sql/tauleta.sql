CREATE TABLE tauleta
(
  id SERIAL,
  marca character varying(50),
  model character varying(50),
  color character varying(50),
  preu numeric(6,2),
  imatge character varying(100),
  CONSTRAINT tauleta_pkey PRIMARY KEY (id)
);

INSERT INTO tauleta(marca, model, color, preu, imatge)
    VALUES ('Xiaomi', 'MiPad2', 'Negro', 295.99, 'Xiaomi.png');
INSERT INTO tauleta(marca, model, color, preu, imatge)
    VALUES ('Windows', 'Windows', 'Negro', 325.99, 'Windows.png');
INSERT INTO tauleta(marca, model, color, preu, imatge)
    VALUES ('HP', 'Pro Slate 8', 'Negro', 150.99, 'Hp.png');    
INSERT INTO tauleta(marca, model, color, preu, imatge)
    VALUES ('Apple', 'iPad Mini 2', 'Gris Espacial', 150.99, 'Apple.png');    

CREATE TABLE so (id SERIAL, ssoo varchar);
INSERT INTO public.so(ssoo)
    VALUES ('Chino');
INSERT INTO public.so(ssoo)
    VALUES ('Windows');
INSERT INTO public.so(ssoo)
    VALUES ('Android');
INSERT INTO public.so(ssoo)
    VALUES ('iOS');        