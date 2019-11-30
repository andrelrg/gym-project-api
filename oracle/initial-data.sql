create or replace type Telefone_TY as object (
 DDD number(5),
 Numero number(10)
);

create or replace type Telefone_NT as table of Telefone_TY;

create or replace type Endereco_TY as object (
 Rua varchar2(20),
 Numero number(5),
 Cidade varchar2(20),
 Bairro varchar2(20),
 CEP number(8),
 Estado varchar2(2)
);

create or replace type Usuario_TY as object (
 RG number(20),
 Nome varchar2(20),
 Sobrenome varchar2(20),
 Email varchar2(45),
 Senha varchar2(45),
 Sexo varchar2(10),
 Telefone Telefone_NT,
 Endereco Endereco_TY
) NOT FINAL;

create or replace type Personal_TY under Usuario_TY (
 Especializacao varchar2(50),
 Tempo_experiencia varchar2(20)
);

create or replace type Aluno_TY under Usuario_TY (
 Objetivo varchar2(15),
 Peso number(5),
 Altura number(5),
 Med_braco_direito number(5),
 Med_braco_esquerdo number(5),
  Med_perna_direita number(5),
 Med_perna_esquerda number(5),
 Med_peito number(5),
 Med_abdomen number(5)
);

create or replace type Academia_TY as object (
 Id number(5),
 Nome varchar2(20),
 Endereco Endereco_TY,
 Telefone Telefone_NT,
 Email varchar2(20),
 Funcionamento_semana varchar2(20),
 Funcionamento_sabado varchar2(20),
 Funcionamento_domingo varchar2(20),
 Funcionamento_feriado varchar2(20)
);

create or replace type Aparelho_TY as object (
 Id number(5),
 Codigo number(10),
 Nome varchar2(20),
 Musculo varchar2(20),
 Identificacao varchar2(20)
);

create or replace type Exercicio_TY as object (
 Id number(5),
 Nome varchar2(20),
 Series number(5),
 Repeticoes number(5),
 Descanso number(5),
 Maquina ref Aparelho_TY
);

create or replace type Treino_TY as object (
 Dia date,
 Ordem number(5),
 Exercicio ref Exercicio_TY,
 Aluno ref Aluno_TY
);

create or replace type Agendamento_TY as object (
 Id number(5),
 Dia date,
 Hora varchar2(10),
 Aluno ref Aluno_TY,
 Personal ref Personal_TY,
 Academia ref Academia_TY
);


-- Criação das tabelas

create table Pessoas of Usuario_TY (primary key (RG))
 nested table Telefone store as Telefone_ST;
create table Aluno of Aluno_TY (primary key (RG))
 nested table Telefone store as Telefone_Aluno_ST;
create table Personal of Personal_TY (primary key (RG))
 nested table Telefone store as Telefone_Personal_ST;
create table Academia of Academia_TY (primary key (Id))
 nested table Telefone store as Telefone_Academia_ST;
create table Aparelho of Aparelho_TY (primary key (Id));
create table Exercicio of Exercicio_TY (primary key (Id));
create table Agendamento of Agendamento_TY (primary key (Id));