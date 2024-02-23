<h1 align="center">Mix Canvas</h1>
<p align=center><i align="center">Aplicação web utilizada pelos alunos da pós-gradução do IFRJ - Eng. Paulo de Frontin.</i></p>

<div align="center">

<a href="https://developer.mozilla.org/pt-BR/docs/Web/HTML">
<img alt="HTML" src="https://img.shields.io/badge/HTML-E34F26.svg?logo=html5&logoColor=white">
</a>
<a href="https://www.php.net">
<img alt="PHP" src="https://img.shields.io/badge/PHP-%23777BB4.svg?logo=php&logoColor=white">
</a>
<a href="https://developer.mozilla.org/pt-BR/docs/Web/CSS">
<img alt="CSS" src="https://img.shields.io/badge/CSS-1572B6.svg?logo=css3&logoColor=white">
</a>
<a href="https://sass-lang.com">
<img alt="SASS" src="https://img.shields.io/badge/Sass-hotpink.svg?logo=SASS&logoColor=white">
</a>
<a href="https://www.mysql.com">
<img alt="MySQL" src="https://img.shields.io/badge/MySQL-%2300f.svg?&logo=MySQL&logoColor=white">
</a>

<a href=""><img src="https://img.shields.io/badge/version-3.0.3-240223?" height="22" alt="Version"/></a>

<br>

|| [Notas de versão](#section-changelog) || [Autores](#section-autores) ||

</div>

<a name="section-changelog">

## Notas de versão

</a>

### v3.0.3.240223

- Realocação de arquivos para o diretório correto.
- Correção no redirecionamento de botões.
- Removido `arquivos` , `funções` e `scripts` que não eram utilizados.
- Feito um controller para gerenciar a lista de projetos.
- Criado um componente, que ira servir para gerar a lista de projetos.

### v3.0.2.240222

- Mudança no background da `dashboard`.
- Instalado uma nova biblioteca `Flowbite`.
- Ajustes na tela de `Projetos` e `Novos Projetos`.
- Modificado a barra de navegação da `dashboard`.

### v3.0.1.240220

- Realocação de arquivos, para o diretório correto.
- Ajustes no redirecionamento das APIs.
- Instalado o framework `TailwindCSS`.
- Introdução a duas novas funcionalidades no projeto.

### v3.0.0.232011

- Realocação de Repositório.
- Estruturação de pastas em estilo MVC (`Model View Controller`).
- Refatoração de código.

> OBS: Caso queria acompanhar as modificações citadas no changelog do projeto, acesse (este)[https://github.com/RRyanDEV/mix-canvas] repositório.

##

### v2.0.0.231003

- Removido arquivos e funções que não eram utilizadas.
- Novo método de envio e recebimento de informações do Banco de Dados.
- Versão final do projeto.

##

### v1.5.8.231003

- Feito um novo método para armazenar as informações preenchidas.
- Tentativa de implementar, atualização das informações já preenchidas sem que gere uma cópia das informações que não foram editadas.
- Feito uma função que puxa os valores do banco de dados.

### v1.5.7.231002

- Função para acompanhar o passo do formulário de acordo com o click no card desejado.
- Correção no `id do usuário` que não estava sendo enviado para o banco, junto as respostas.
- Verificação de email ja cadastrado, adicionado.

### v1.5.6.230928

- Modificado o modo de segurança da senha e verificação de credencial.

### v1.5.5.230925

- Atualização no banco de dados.
- Modificado o modo de segurança da senha.
- Porta do servidor para conexão modificada.

### v1.5.4.230919

- Atualização do estilo do formulário.

### v1.4.4.230906

- Mudanças no layout dos formulários.
- Update nos botões de avançar e retroceder.

### v1.4.3.230904

- Reorganização do direcionamento das páginas.
- Novas funções adicionadas aos cartões.
- Mudanças nas questões do formulário.
- Novo arquivo SASS, onde contêm a estilização dos botões.

### v1.3.3.230824

- Ajustes para onde redirecionava as páginas.
- Reorganização do código de autenticação.
- Alteração de tags usadas no código. Modificando para mais atuais.

### v1.3.2.230822

- Modificações na dashboard.

### v1.2.2.230819

- Modificações na dashboard.
- Schema do database atualizado.
- Corrigido problema de autenticação do usuário.
- Novo layout de barra de navegação para a dashboard.
- Corrigido para onde redirecionava ao finalizar sessão.

### v1.2.1.230818

- Adicionado uma dashboard para visualização das informações preenchidas.
- Sistema de login/cadastro adicionado e rodando.
- Reestruturação de pastas e arquivos.
- Criado um pasta contendo o database utilizado no projeto. `OBS: Ser usado localmente`

### v1.2.0.230812

- Update na tela principal, sendo adicionado um modal, para tela de cadastro.
- Update na logo e nome da página do projeto.

### v1.1.0.230810

- Update na tela principal, se tornando um página login/cadastro.
- Elementos tiveram seus tamanhos e cores modificados.
- Atualização do plano de fundo.
- Algumas funções novas adicionadas.

### v1.0.0.230702

- Corrigido problemas de envio das informações.
- Feito uma função, somente para o envio do formulário.
- Refatoração e Reestruturação do código.

##

### v0.5.8.230630

- Problemas encontrados nessa versão que impedem o avanço do formulário até o final.
- Primeiras tentativas de envio de informações para o formulário.

##

### v0.5.8.230612

- Refatorado as condições que dão funcionalidade aos botões.
- Criado uma condição (IF) onde faz a requisição de todos os `METHOD POST` do formulário.

##

### v0.5.7.230609

- Criado um botão de retorno.
- Adicionado funcionalidade ao botão de retorno.
- Tentativa de fazer com que o valor escrito no formulario seja guardado, ao avançar e retroceder.
- Reestruturado a condição de armazenamento dos valores.

##

### v0.5.6.230607

- Criado um botão de retorno.
- Tentativa de adicionar funcionalidade ao botão (Falha❌).
- Reestruturação de algumas variáveis, usando o `_SESSION`.

##

### v0.5.5.230602

- Modificação na variáviel que faz a verificação do index no array.
- Feito um tratamento em Switch Case, para demonstrar os cards.
- Criado as variáveis que iram armazenar os valores colocados no formulário.
- Modificação na forma de exibição dos cards.

##

### v0.5.4.230522

- Primeiro tratamento no backend.
- Tentativa de adicionar funcionalidade no botão de próximo.

##

### v0.5.3.230512

- Importação de uma nova fonte.
- Importação da biblioteca do jQuery.
- Modificação no tamanho e estilo do formulário.
- Feito um contador de caracteres para resposta do usuário.
- Correção das variáveis onde é armazenado o valor das respostas.

##

### v0.4.3.230511

- Feito um array bidimensional, onde armazena as informações que serão alteradas do formulário.
- Criado uma função que gera o esboço do card.
- Criado uma função que altera as informações do formulário de acordo com o index do array.

##

### v0.4.2.230508

- Feita uma cópia do arquivo `formulario.php`, para `formulario.html`, com intuito de facilitar a visualização da estilização.
- Adicionado a funcionalidade no botão de avançar.
- Alteração no estilo do formulário.

##

### v0.3.2.230506

- Finalizado o primeiro card de pergunta.
- Animações criadas no background.
- Ajuste na paleta de cores.
- Ajuste no tamanho dos elementos.
- Reestruturação do código.

##

### v0.2.2.230503

- Validação de email no database.
- Estruturação das variáveis `$_POST` usando `$_SESSION`.
- Ajustes no estilo.
- Reestruturação dos cards de perguntas.

##

### v0.2.1.230501

- Estilização da home page.
- Reestruturação das pastas do projeto.
- Ajustes no estilo.

##

### v0.1.1.230428

- Estilização da home page.
- Criação dos cards onde ficará as perguntas e respostas.

##

### v0.0.1.230424

- Criação do repositório.
- Introdução a criação da home page.
- Conexão do projeto com o database(MySQL).
- Criação da documentação (README).

<a name="section-autores">

## Autores

</a>

<a href="https://github.com/RRyanDEV/mix-canvas/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=RRyanDEV/mix-canvas" />
</a>
