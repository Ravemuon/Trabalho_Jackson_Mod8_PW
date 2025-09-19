-- DESATIVA CHECAGEM DE FOREIGN KEYS TEMPORARIAMENTE
SET FOREIGN_KEY_CHECKS = 0;

-- LIMPA TABELAS NA ORDEM CORRETA
DELETE FROM encomendas;
ALTER TABLE encomendas AUTO_INCREMENT = 1;

DELETE FROM produtos;
ALTER TABLE produtos AUTO_INCREMENT = 1;

DELETE FROM categorias;
ALTER TABLE categorias AUTO_INCREMENT = 1;

-- REATIVA CHECAGEM DE FOREIGN KEYS
SET FOREIGN_KEY_CHECKS = 1;

-- INSERE CATEGORIAS (ORIXÁS E LINHAS)
INSERT INTO categorias (nome, descricao, imagem, linha, cores, dia_semana, historia, simbolos, saudacoes, personalidade, animais, elementos, datas_rituais, notas, created_at, updated_at) VALUES
('Oxalá', 'Orixá da criação, pureza e paz', 'https://via.placeholder.com/300x200?text=Oxalá', 'orixa', 'Branco', 'Segunda-feira', 'O criador e pacificador do mundo', 'Cajado, veste branca', 'Axé!', 'Calmo e justo', 'Cegonha', 'Ar', '21/12 - 25/12', '', NOW(), NOW()),
('Iemanjá', 'Orixá das águas, proteção e maternidade', 'https://via.placeholder.com/300x200?text=Iemanjá', 'orixa', 'Azul e branco', 'Sábado', 'Protetora das famílias e dos pescadores', 'Conchas, colares', 'Oba, Iemanjá!', 'Mãe protetora', 'Peixes, Golfinhos', 'Água', '02/02 - 08/12', '', NOW(), NOW()),
('Ogum', 'Orixá da guerra e proteção', 'https://via.placeholder.com/300x200?text=Ogum', 'orixa', 'Azul escuro e vermelho', 'Terça-feira', 'Patrono dos guerreiros e ferreiros', 'Espada, ferro', 'Laroiê!', 'Corajoso e direto', 'Cão', 'Fogo', '23/04', '', NOW(), NOW()),
('Xangô', 'Orixá da justiça e força', 'https://via.placeholder.com/300x200?text=Xangô', 'orixa', 'Vermelho e branco', 'Quarta-feira', 'Senhor da justiça e do trovão', 'Machado duplo, pedras', 'Kaô!', 'Justo e temperamental', 'Leão', 'Fogo', '30/09', '', NOW(), NOW()),
('Oxóssi', 'Orixá da caça e fartura', 'https://via.placeholder.com/300x200?text=Oxóssi', 'orixa', 'Verde', 'Quinta-feira', 'Protetor da caça e da floresta', 'Arco e flecha', 'Arô Oxóssi!', 'Sagaz e paciente', 'Veado', 'Terra', '20/01', '', NOW(), NOW()),
('Caboclo', 'Espírito de proteção e sabedoria', 'https://via.placeholder.com/300x200?text=Caboclo', 'linha', 'Verde e marrom', 'Domingo', 'Guias da natureza e cura', 'Facão, penas', 'Epa!', 'Sábio e protetor', 'Onça', 'Terra', '15/08', '', NOW(), NOW()),
('Preto-Velho', 'Espírito ancestral, conselheiro', 'https://via.placeholder.com/300x200?text=Preto-Velho', 'linha', 'Cinza', 'Sexta-feira', 'Ancião que guia e aconselha', 'Cajado, charutos', 'Axé!', 'Calmo e experiente', 'Coruja', 'Ar', '01/11', '', NOW(), NOW()),
('Exu', 'Guardião dos caminhos e encruzilhadas', 'https://via.placeholder.com/300x200?text=Exu', 'linha', 'Vermelho e preto', 'Terça-feira', 'Mensageiro e guardião de caminhos', 'Tridente, chaves', 'Laroiê!', 'Astuto e rápido', 'Cachorro', 'Fogo', '25/12', '', NOW(), NOW()),
('Pomba Gira', 'Espírito feminino de força e sedução', 'https://via.placeholder.com/300x200?text=Pomba+Gira', 'linha', 'Vermelho e rosa', 'Sábado', 'Encanta e protege nos trabalhos amorosos', 'Espelhos, leques', 'Epa!', 'Sensual e intensa', 'Cavalo', 'Fogo', '31/12', '', NOW(), NOW());

-- INSERE PRODUTOS
INSERT INTO produtos (nome, descricao, preco, imagem, categoria_id, estoque, codigo, peso, dimensoes, tags, popular, ativo, observacoes, created_at, updated_at) VALUES
('Velas de Oxalá', 'Velas brancas para oferenda', 15.00, 'https://via.placeholder.com/300x200?text=Velas+Oxalá', 1, 20, 'VXO001', 0.2, '10x3 cm', 'vela,oxala,oferta', 1, 1, '', NOW(), NOW()),
('Estátua de Ogum', 'Estátua para altar de Ogum', 120.00, 'https://via.placeholder.com/300x200?text=Ogum', 3, 5, 'ESTO001', 1.5, '20x10x10 cm', 'estatua,ogum', 1, 1, '', NOW(), NOW()),
('Imagem de Iemanjá', 'Imagem da orixá Iemanjá', 80.00, 'https://via.placeholder.com/300x200?text=Iemanjá', 2, 10, 'IMG001', 0.8, '15x10x5 cm', 'imagem,iemanja', 1, 1, '', NOW(), NOW()),
('Patuá de Oxóssi', 'Amuleto protetor', 25.00, 'https://via.placeholder.com/300x200?text=Oxóssi', 5, 30, 'PAT001', 0.1, '5x5 cm', 'amulet,oxossi', 1, 1, '', NOW(), NOW()),
('Guias de Caboclo', 'Colares para trabalhos espirituais', 30.00, 'https://via.placeholder.com/300x200?text=Caboclo', 6, 15, 'GUIA001', 0.3, '15 cm', 'guia,caboclo', 1, 1, '', NOW(), NOW()),
('Velas de Preto-Velho', 'Velas para oferendas e proteção', 12.00, 'https://via.placeholder.com/300x200?text=Preto-Velho', 7, 25, 'VPH001', 0.2, '10x3 cm', 'vela,preto-velho', 1, 1, '', NOW(), NOW()),
('Estátua de Exu', 'Estátua protetora', 100.00, 'https://via.placeholder.com/300x200?text=Exu', 8, 7, 'ESTEX001', 1.2, '18x10x10 cm', 'estatua,exu', 1, 1, '', NOW(), NOW()),
('Guias de Pomba Gira', 'Colares para trabalhos espirituais', 35.00, 'https://via.placeholder.com/300x200?text=Pomba+Gira', 9, 12, 'GUIAPG001', 0.4, '15 cm', 'guia,pomba-gira', 1, 1, '', NOW(), NOW());
