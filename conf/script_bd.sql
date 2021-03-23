CREATE DATABASE gn;
CREATE TABLE trabalho(
cod INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(45) NOT NULL,
descricao TEXT NOT NULL,
materia VARCHAR(45) NOT NULL,
nota DOUBLE,
entrega date NOT NULL,
entregue INT(1) DEFAULT 0,
PRIMARY KEY (cod)
);

-- -- INSERTS -- --

INSERT INTO trabalho (cod, nome, descricao, materia, nota, entrega, entregue) 
VALUES (null, 'Soma',
'Fazer uma soma de 5 numeros.
Exemplo: 10+2+5+7+12=36
*ENTREGAR EM ARQUIVO PDF', 'Matemática', 95 ,'2021-03-12', 1),
(null, 'Subtração',
'Fazer uma sumbtração entre 2 numeros.
Exemplo: 50-26=24', 'Matemática', 0 ,'2021-03-19', 0),
(null, 'Gêneros e Movimentos Musicais Brasileiros',
'Responder o Formulário', 'Artes', 100 ,'2021-02-25', 0),
(null, 'Avaliação Sociologia 3 trimestre',
'Olá, estudante. Chegou a hora da última avaliação do ano de 2020. É uma formulário de resposta verdadeiro ou falso. 
Só poderá ser respondido uma vez, portanto, tenha seu material de estudo junto a você para responder. 
Boa sorte e continuem se cuidando.', 'Sociologia', 100 ,'2021-10-05', 0),
(null, 'IMPERIALISMO - Última tarefa',
'Importante: * Esta é a última atividade do ano letivo de 2020! Ufa... chegou o fim!!!!
São somente 10 (dez) questõezinhas para fazer, é rapidinho!!!
Com base nessa ideia de fazer a atividade menor por conta de que já estamos no final do ano e há outras disciplinas 
também que vocês necessitam dar conta, mudei a proporção das notas: a atividade anterior vai passar a 
valer 6,0 e esta vai valer 4,0, daí fecha 10,0.
Prazo de uma semana para entregar, depois da entrega eu corrijo rapidinho e ja aviso quem passou e quem 
pegou recuperação, ok?!', 'História', 100 ,'2021-02-09', 0),
(null, 'Exercícios de pH e pOH',
'Na segunda vamos tirar dúvidas sobre o exercício e depois vocês receberão a atividade que avaliará 
equilíbrio químico e pH/pOH.
As respostas devem ser anexadas via registro de imagem/pdf', 'Química', 100 ,'2022-02-25', 1),
(null, 'Avaliação de cinética',
'Responda as perguntas e apresente o raciocínio para chegar nas respostas','Química', 80 ,'2020-12-17', 1),
(null, 'Segunda atividade - Salvador Dalí',
'As respostas devem ser todas em espanhol, feitas individualmente. Segue o arquivo com a atividade 
e o link para assistir ao vídeo. As respostas devem ser dadas nesse mesmo arquivo. Vale 2,0 pontos.', 'Espanhol', 100 ,'2023-04-07', 0),
(null, 'Trabajo - reportaje',
'Bom dia, turma! 
Como combinado, segue a atividade referente a última avaliação do segundo trimestre. Trata-se de uma atividade de 
leitura do texto que já enviei para vocês e que comentei na última aula. Inclusive, a maioria das questões são do livro 
didático (p. 108 e 109). Selecionei algumas que considerei mais relevantes.
Resolvi não fazer nenhuma questão sobre o vídeo agora, pois a atividade ficaria muito grande. Vamos deixar o 
vídeo mais para frente.', 'Espanhol',80 ,'2020-09-24', 0),
(null, 'Atividades',
'Na data de entrega, às 10:30, teremos uma aula para resolver esses exercícios e esclarecer dúvidas. Link da aula:
https://meet.google.com/mdn-wrey-ewa', 'Matemática',80 ,'2020-09-24', 0);
