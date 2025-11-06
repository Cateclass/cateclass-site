# DOCUMENTAÇÃO DA APLICAÇÃO WEB
<div align="center">

![Logo Cateclass](/docs/logo-cateclass.png)

### CENTRO PAULA SOUZA - FACULDADE DE TECNOLOGIA DE JAHU  

### CURSO DE TECNOLOGIA EM DESENVOLVIMENTO DE SOFTWARE MULTIPLATAFORMA  

**Jahu, SP**

**Início: 2º semestre/2025**

</div>

**Autores:** 

 - [Lucas Gabriel](https://www.linkedin.com/in/lucas-gabriel-de-paula-pinto-065734241/)
 - [Matheus Paschuinio](https://www.linkedin.com/in/matheus-paschuinio-7630aa336/)
 - [Pedro Paulo]( https://www.linkedin.com/in/pedro-paulo-00114a256/)

---

# 0. SUMÁRIO  

1. [RESUMO DA APLICAÇÃO WEB](#1-resumo-da-aplicação-web)  
2. [OBJETIVO](#2-objetivo)  
3. [MÉTODOS DA PESQUISA](#3-métodos-da-pesquisa)  
4. [DOCUMENTO DE REQUISITOS](#4-documento-de-requisitos)
   - [Requisitos funcionais](#41-requisitos-funcionais)
   - [Requisitos não funcionais](#42-requisitos-não-funcionais)
5. [REGRAS DE NEGÓCIO](#5-regras-de-negócio)  
6. [ESTUDO DE VIABILIDADE](#6---estudo-de-viabilidade)  
   - [Viabilidade Técnica](#61-viabilidade-técnica)  
   - [Viabilidade Econômica](#62-viabilidade-econômica)  
   - [Viabilidade Operacional](#63-viabilidade-operacional)  
   - [Viabilidade de Mercado](#64-viabilidade-de-mercado)  
7. [MODELO DE DADOS](#7-modelo-de-dados)  
   - [Modelo de Caso de Uso](#71-modelo-de-caso-de-uso)  
   - [Modelo Conceitual](#72-modelo-conceitual)  
   - [Modelo Lógico](#73-modelo-lógico)  
8. [DESIGN](#8-design)  
9. [PROTÓTIPO](#9-protótipo)  
10. [APLICAÇÃO](#10-aplicação)  
11. [CONSIDERAÇÕES FINAIS](#11-considerações-finais)  
12. [REFERÊNCIAS BIBLIOGRÁFICAS](#12-referências-bibliográficas)  

---

## 1. RESUMO DA APLICAÇÃO WEB 
O Cateclass é uma plataforma desenvolvida para facilitar a comunicação e a organização na catequese. Muitas vezes, catequistas, pais e catequizandos enfrentam dificuldades com a troca de informações e o controle das atividades. O sistema busca centralizar essas informações, tornando a comunicação mais rápida, prática e acessível.

---

## 2. OBJETIVO  
- Facilitar a comunicação entre a paróquia, catequistas, pais e catequizandos.

- Organizar encontros, eventos e comunicados da catequese.

- Oferecer um ambiente acessível via computador ou celular.

---

## 3. MÉTODOS DA PESQUISA  
 
 Para o desenvolvimento do cateclass foi adotada uma abordagem aplicada e exploratoria,buscando compreender e solucionar um problema real enfrentado nas comunidades paroquiais: a dificuldade de comunicação entre a catequistas,pais e catequizandos.

 o processo  de pesquisa foi conduzido com base em atividades e orientações disponibilizadas no google classroom,onde o grupo estruturou as etapas de desenvolvimento,planejamento e validação do projeto,Dessa forma,todo  o  trabalho foi fundamentado em conteúdos apresentados em sala nas discussões ao longo do semesetre

 As etapas da pesquisa foram organizadas da seguinte forma:

 ---

 ## 3.1 Levantamento de Requisitos 

 A primeira etapa consistiu em identificar as principais necessidades da catequese,observando as dificuldades na troca de informações entre catequistas e pais, além do gerenciamento de atividades e envio de comunicados.
 Essa informações  serviram de base para definir os os requisistos funcionais e não funcionis do sistema, dempre com o objetivo de criar uma solução pratica e eficiente.

---

## 3.2 Análise e estudo Teórico 

Com base nas atividades e materiais disponibilizados pelo Professor no classroom,o grupo estudou conceitos sobre engenharia de software,levantamento de requisitos e prototipagem,aplicando essas referências na elaboração dos modelos e na organização do projeto.
 
---

## 3.3 Modelagem e prototipagem  

 Após a definição dos requisitos,foram criados os  mdoelos de diagramas de caso de uso,diagrama de classes,modelo conceitual e modelo lógico,representando as principais interações do sistema e suas entidades.
 Em seguida,o grupo elaborou um protótipo das telas,permitindo visualizar como seria a navegação e a estrutura da aplicação.

---

## 3.4 Desenvolvimento da aplicação 

com os modelos prontos,inciou-se a etapa de desenvolvimento do sistema,utilizando ferramentas de programação web e seguindo os conceitos apresentados em aula,o objetivo foi construir uma aplicação funcional, de facíl uso e que pudesse ser acessada tanto por computador quanto por dispositivos móveis.

---

## 3.5 Teste e validação

 na fase final,o grupo realizou testes internos para verificar o funcionamento das principais funcionalidades e corrigir evntuais falhas,além disso,foram feito ajustes de usabilidade e alinhamentos com as necessidades observadas na fase final.

 ---

 Por meio dessas etapas,o projeto Cateclass foi desenvolvido de forma colaborativa  estruturada,unindo a teoria estudada no curso com a prática da construnção de um sistema real,o método aplicado permitiu que o grupo compreendesse todas as etapas do processo de desenvolvimento de software,desde a identifcação do problema até a entrega da solução final.

## 4. DOCUMENTO DE REQUISITOS  

Um Documento de Requisitos de Sistema é parte essencial no desenvolvimento de software, pois deve descrever, detalhadamente, as funcionalidades, características e restrições que o sistema deve atender. Esse documento inclui requisitos funcionais (ações que o sistema deve executar), requisitos não funcionais (como desempenho, segurança e usabilidade) e possíveis restrições técnicas. Com a definição clara dos requisitos, evita-se falhas na comunicação, reduz-se os riscos no desenvolvimento e garante-se que o produto final atenda às expectativas dos usuários e os objetivos do projeto.

### 4.1 Requisitos funcionais  
- 2.1.1 RF1 - Gerenciar Usuários
- 2.1.2 RF2 - Realizar Login
- 2.1.3 RF3 - Recuperar Senha
- 2.1.4 RF4 - Gerenciar Turmas
- 2.1.5 RF5 - Gerenciar Catequizandos
- 2.1.6 RF6 - Realizar Inscrição em Turma
- 2.1.7 RF7 - Publicar Avisos (Mural)
- 2.1.8 RF8 - Publicar Materiais
- 2.1.9 RF9 - Criar Atividades
- 2.1.10 RF10 - Entregar Atividades
- 2.1.11 RF11 - Dar Feedback de Atividades
- 2.1.12 RF12 - Apresentar Agenda/Calendário
- 2.1.13 RF13 - Registrar Frequência
- 2.1.14 RF14 - Acompanhamento do Catequizando
- 2.1.15 RF15 - Sistema de Mensagens
- 2.1.16 RF16 - Exibir Informações Sobre o Projeto/Paróquia
- 2.1.17 RF17 - Contato

### 4.2 Requisitos não funcionais  
- 2.2.1 RNF1 - Desempenho
- 2.2.2 RNF2 - Segurança
- 2.2.3 RNF3 - Usabilidade
- 2.2.4 RNF4 - Disponibilidade
- 2.2.5 RNF5 - Manutenibilidade
- 2.2.6 RNF6 - Compatibilidade

---

## 5. REGRAS DE NEGÓCIO  
![Regras de Negócio do projeto Cateclass](/docs/regrasDeNegocio.png)

---

## 6 - ESTUDO DE VIABILIDADE  


---

## 7. MODELO DE DADOS  
(Colocar imagens dos modelos)

### 7.1 Modelo de Caso de Uso


### 7.2 Modelo Conceitual  


### 7.3 Modelo Lógico  


---

## 8. DESIGN  

### 8.1 Paleta de Cores

### 8.2 Tipografia

### 8.3 Logo

### 8.4 Modelo de Navegação

---

## 9. PROTÓTIPO  



---

## 10. APLICAÇÃO  
(Descrição da Aplicação)

---

## 11. CONSIDERAÇÕES FINAIS  
(Considerações Finais)

---

## 12. REFERÊNCIAS BIBLIOGRÁFICAS  
FIGMA. Figma: The collaborative interface design tool. [Software]. São
Francisco: Figma, [s.d.]. Disponível em: https://www.figma.com. Acesso em: 16 jun.2025.

PRESSMAN, R. S. Engenharia de Software: uma abordagem profissional. 8 ed.
Porto Alegre: AMG, 2016.

SEBRAE. CANVAS. Portal SEBRAE, 2021. Disponível em: &lt;
https://sebrae.com.br/sites/PortalSebrae/produtoseservicos/conteudos/canvas,02d9d
1159cbfe610VgnVCM1000004c00210aRCRD &gt;. Acesso em: 01 jun. 2025.

SOMMERVILLE, I. Engenharia de Software, 9 ed. São Paulo: Pearson Prentice
Hall, 2011.
