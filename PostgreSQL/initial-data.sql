create type Telefone_TY as (
 DDD varchar(5),
 Numero varchar(10)
);

create type Endereco_TY as (
 Rua varchar(20),
 Numero varchar(5),
 Cidade varchar(20),
 Bairro varchar(20),
 CEP varchar(8),
 Estado varchar(2)
);

create type Usuario_TY as (
 RG varchar(20),
 Nome varchar(20),
 Sobrenome varchar(20),
 Email varchar(45),
 Senha varchar(45),
 Sexo varchar(10),
 Telefone Telefone_TY[],
 Endereco Endereco_TY[]
);

create type Personal_TY as (
 Especializacao varchar(50),
 Tempo_experiencia varchar(20)
);

create type Aluno_TY as (
 Objetivo varchar(15),
 Peso varchar(5),
 Altura varchar(5),
 Med_braco_direito varchar(5),
 Med_braco_esquerdo varchar(5),
 Med_perna_direita varchar(5),
 Med_perna_esquerda varchar(5),
 Med_peito varchar(5),
 Med_abdomen varchar(5)
);

create type Academia_TY as (
 Nome varchar(20),
 Endereco Endereco_TY[],
 Telefone Telefone_TY[],
 Email varchar(20),
 Funcionamento_semana varchar(20),
 Funcionamento_sabado varchar(20),
 Funcionamento_domingo varchar(20),
 Funcionamento_feriado varchar(20)
);

create type Aparelho_TY as (
 Codigo varchar(10),
 Nome varchar(20),
 Musculo varchar(20),
 Identificacao varchar(20)
);

create type Exercicio_TY as (
 Nome varchar(20),
 Series varchar(5),
 Repeticoes varchar(5),
 Descanso varchar(5)
);

CREATE TABLE Pessoas (
    usuario Usuario_TY
);

CREATE TABLE Alunos (
	aluno Aluno_TY
) INHERITS (Pessoas);

CREATE TABLE Personais (
	personal Personal_TY
) INHERITS (Pessoas);

CREATE TABLE Academias (
	academia Academia_TY
);

CREATE TABLE Aparelhos (
	aparelho Aparelho_TY
);

CREATE TABLE Exercicios (
	exercicio Exercicio_TY
) INHERITS (Aparelhos);

CREATE TABLE Treinos (
	dia varchar(3)
) INHERITS (Exercicios, Alunos);

CREATE TABLE Agendamentos (
	aluno Aluno_TY,
	personal Personal_TY,
	dia date,
	hora varchar(10)
) INHERITS (Academias);