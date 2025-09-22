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
('Iansã', 'Orixá dos ventos e tempestades, senhora da energia', 'https://via.placeholder.com/300x200?text=Iansã', 'orixa', 'Vermelho e marrom', 'Quarta-feira', 'Senhora dos ventos, raios e tempestades', 'Espada, chifres de boi', 'Odé!', 'Corajosa e independente', 'Cavalo', 'Ar', '04/06', '', NOW(), NOW()),
('Oxum', 'Orixá do amor, da fertilidade e das águas doces','https://via.placeholder.com/300x200?text=Oxum', 'orixa', 'Amarelo e dourado', 'Sábado', 'Protetora dos sentimentos e da harmonia', 'Espelhos, leques, pulseiras douradas', 'Oraieieo!','Carinhosa e vaidosa', 'Peixes, Cisnes', 'Água', '08/12', '', NOW(), NOW());
('Obaluaê', 'Orixá da saúde, cura e transformação', 'https://via.placeholder.com/300x200?text=Obaluaê', 'orixa', 'Branco e marrom', 'Sábado', 'Protetor da saúde e doenças', 'Capa de palha, cajado', 'Axé!', 'Paciente e curador', 'Rato', 'Terra', '16/08', '', NOW(), NOW()),
('Nanã', 'Orixá das águas paradas, ancestralidade', 'https://via.placeholder.com/300x200?text=Nanã', 'orixa', 'Lilás e roxo', 'Sábado', 'Senhora da lama e das águas antigas', 'Cajado, cabaça', 'Eparrê!', 'Sábia e reflexiva', 'Jacaré', 'Água', '22/09', '', NOW(), NOW()),
('Oxumaré', 'Orixá da riqueza e movimento', 'https://via.placeholder.com/300x200?text=Oxumaré', 'orixa', 'Verde e amarelo', 'Sexta-feira', 'Serpente que gira o arco-íris', 'Serpente, arco-íris', 'Axé!', 'Flexível e renovador', 'Serpente', 'Ar/Terra', '06/11', '', NOW(), NOW()),
('Omulu', 'Orixá da doença e cura', 'https://via.placeholder.com/300x200?text=Omulu', 'orixa', 'Branco e preto', 'Sábado', 'Senhor da saúde, doença e renovação', 'Capa de palha, cajado', 'Axé!', 'Misterioso e transformador', 'Cão', 'Terra', '23/07', '', NOW(), NOW()),
('Caboclo', 'Espírito de proteção e sabedoria', 'https://via.placeholder.com/300x200?text=Caboclo', 'linha', 'Verde e marrom', 'Domingo', 'Guias da natureza e cura', 'Facão, penas', 'Epa!', 'Sábio e protetor', 'Onça', 'Terra', '15/08', '', NOW(), NOW()),
('Preto-Velho', 'Espírito ancestral, conselheiro', 'https://via.placeholder.com/300x200?text=Preto-Velho', 'linha', 'Cinza', 'Sexta-feira', 'Ancião que guia e aconselha', 'Cajado, charutos', 'Axé!', 'Calmo e experiente', 'Coruja', 'Ar', '01/11', '', NOW(), NOW()),
('Exu', 'Guardião dos caminhos e encruzilhadas', 'https://via.placeholder.com/300x200?text=Exu', 'linha', 'Vermelho e preto', 'Terça-feira', 'Mensageiro e guardião de caminhos', 'Tridente, chaves', 'Laroiê!', 'Astuto e rápido', 'Cachorro', 'Fogo', '25/12', '', NOW(), NOW()),
('Pomba Gira', 'Espírito feminino de força e sedução', 'https://via.placeholder.com/300x200?text=Pomba+Gira', 'linha', 'Vermelho e rosa', 'Sábado', 'Encanta e protege nos trabalhos amorosos', 'Espelhos, leques', 'Epa!', 'Sensual e intensa', 'Cavalo', 'Fogo', '31/12', '', NOW(), NOW());
('Erê', 'Espírito infantil de alegria e brincadeira', 'https://via.placeholder.com/300x200?text=Erê', 'linha', 'Colorido', 'Sábado', 'Espírito infantil que traz leveza, alegria e proteção', 'Brinquedos, doces', 'Axé!', 'Brincalhão e travesso', 'Criança', 'Ar', '01/01', '', NOW(), NOW()),
('Baiano', 'Espírito de força, proteção e sabedoria', 'https://via.placeholder.com/300x200?text=Baiano', 'linha', 'Azul e branco', 'Domingo', 'Guias que trazem proteção e força nos trabalhos espirituais', 'Facão, tambor', 'Epa!', 'Corajoso e alegre', 'Cavalo', 'Terra', '02/07', '', NOW(), NOW()),
('Marinheiro', 'Espírito ligado ao mar e viagens', 'https://via.placeholder.com/300x200?text=Marinheiro', 'linha', 'Azul', 'Sábado', 'Guia protetor das viagens e do mar', 'Âncora, corda', 'Laroiê!', 'Aventureiro e protetor', 'Golfinho', 'Água', '20/08', '', NOW(), NOW()),
('Cigano', 'Espírito da liberdade e alegria', 'https://via.placeholder.com/300x200?text=Cigano', 'linha', 'Vermelho e dourado', 'Sexta-feira', 'Guias que trazem alegria, sorte e dança', 'Cartas, lenços coloridos', 'Epa!', 'Sociável e alegre', 'Cavalo', 'Fogo', '05/09', '', NOW(), NOW());

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
('Arruda', 'Erva de proteção e limpeza espiritual.', 5.50, 'https://exemplo.com/arruda.jpg', 10, 50, 'ERV001', 0.05, '10x5x2 cm', 'protecao,limpeza', 1, 1, 'Uso em banhos e amuletos', NOW(), NOW()),
('Manjericão', 'Erva para prosperidade e equilíbrio.', 6.00, 'https://exemplo.com/manjericao.jpg', 10, 40, 'ERV002', 0.05, '10x5x2 cm', 'prosperidade,harmonia', 1, 1, 'Pode ser usada em rituais ou incensos', NOW(), NOW()),
('Hortelã', 'Erva para limpeza e energização.', 4.50, 'https://exemplo.com/hortela.jpg', 10, 60, 'ERV003', 0.05, '10x5x2 cm', 'purificacao,energia', 1, 1, 'Uso em banhos, chás e rituais', NOW(), NOW()),
('Alecrim', 'Erva de proteção e purificação.', 5.00, 'https://exemplo.com/alecrim.jpg', 10, 45, 'ERV004', 0.05, '10x5x2 cm', 'protecao,energia', 1, 1, 'Pode ser usada em banhos e defumações', NOW(), NOW()),
('Camomila', 'Erva calmante e harmonizadora.', 4.80, 'https://exemplo.com/camomila.jpg', 10, 50, 'ERV005', 0.05, '10x5x2 cm', 'calma,energia', 1, 1, 'Uso em chás e rituais', NOW(), NOW());
('Ametista', 'Cristal violeta de equilíbrio e proteção.', 15.00, 'https://exemplo.com/ametista.jpg', 11, 25, 'PED001', 0.1, '4x4x4 cm', 'equilibrio,protecao', 1, 1, 'Pode ser usada em anéis, colares ou altar', NOW(), NOW()),
('Quartzo Rosa', 'Pedra do amor e harmonia.', 18.00, 'https://exemplo.com/quartzo_rosa.jpg', 11, 20, 'PED002', 0.1, '4x4x4 cm', 'amor,harmonia', 1, 1, 'Uso em rituais de amor e proteção', NOW(), NOW()),
('Citrino', 'Pedra da prosperidade e energia positiva.', 20.00, 'https://exemplo.com/citrino.jpg', 11, 15, 'PED003', 0.12, '5x5x5 cm', 'prosperidade,energia', 1, 1, 'Pode ser usado em altar ou colar', NOW(), NOW()),
('Jade', 'Pedra da harmonia e equilíbrio.', 22.00, 'https://exemplo.com/jade.jpg', 11, 18, 'PED004', 0.12, '5x5x5 cm', 'harmonia,equilibrio', 1, 1, 'Ideal para meditação ou colares', NOW(), NOW()),
('Turmalina Negra', 'Pedra de proteção energética.', 25.00, 'https://exemplo.com/turmalina_negra.jpg', 11, 12, 'PED005', 0.15, '6x6x6 cm', 'protecao,energia', 1, 1, 'Colocar em ambientes ou altar', NOW(), NOW());


-- Cadastro das ervas e pedras
INSERT INTO categorias
(nome, descricao, imagem, linha, cores, dia_semana, historia, simbolos, saudacoes, personalidade, animais, elementos, datas_rituais, notas, created_at, updated_at)
VALUES
('Ervas',
 'Categoria destinada às ervas utilizadas em rituais e práticas espirituais.',
 'https://exemplo.com/imagem-ervas.jpg',
 'Itens',
 'verde, marrom',
 'segunda-feira',
 'Ervas usadas tradicionalmente para proteção, limpeza e energização.',
 'folhas, raízes',
 'Saudações às ervas',
 'Calma, purificação',
 'Coruja, cervo',
 'Terra, água',
 '1º de cada mês',
 'Algumas notas sobre uso e procedência das ervas',
 NOW(),
 NOW()
),
('Pedras',
 'Categoria destinada às pedras utilizadas em rituais e práticas espirituais.',
 'https://exemplo.com/imagem-pedras.jpg',
 'Itens',
 'diversas',
 'segunda-feira',
 'Pedras usadas tradicionalmente para proteção, limpeza e energização.',
 'Cristais, geodos',
 'Saudações às pedras',
 'Equilíbrio, energia positiva',
 'Leão, coruja',
 'Terra, fogo',
 '1º de cada mês',
 'Algumas notas sobre uso e procedência das pedras',
 NOW(),
 NOW()
);
