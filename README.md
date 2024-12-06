 Sistema de Gerenciamento de Tarefas:
Backend (API Laravel)
Configuração do Projeto
	•	Criar o projeto Laravel.
	•	Configurar o ambiente .env com banco de dados, chave da aplicação e outros detalhes.
	•	Configurar rotas e controllers padrão.
Criação das Migrations e Relacionamentos
	•	Criar as migrations para as tabelas:
Usuários: id, nome, email, senha, papel (admin ou colaborador).
Projetos: id, nome, descricao, usuario_id (relacionamento com o criador).
Tarefas: id, nome, descricao, status (pendente, em andamento, concluído), prazo, usuario_id (responsável), projeto_id.
	•	Definir os relacionamentos no Eloquent:
	•	Um usuário pode criar vários projetos.
	•	Um projeto pode ter várias tarefas.
	•	Uma tarefa pertence a um único usuário e um único projeto.
Criar o CRUD no Backend
	•	Usuários:
	•	Rotas e controllers para cadastrar, atualizar e excluir usuários.
	•	Implementar autenticação (se necessário).
	•	Projetos:
	•	Rotas e controllers para criar, atualizar, listar e excluir projetos.
	•	Filtrar projetos por usuário.
	•	Tarefas:
	•	Rotas e controllers para criar, atualizar, listar e excluir tarefas.
	•	Filtrar tarefas por projeto, usuário ou status.
	•	Adicionar validações (ex.: nome obrigatório, prazo válido).
Extras para o Backend
	•	Adicionar paginação para listagens.
	•	Implementar sistema de permissões (ex.: apenas o criador do projeto pode editá-lo).
	•	Criar endpoints para relatórios, como:
	•	Número de tarefas por status.
	•	Tarefas atrasadas.
Frontend (Quasar Framework)
Configuração do Projeto
	•	Criar o projeto Quasar.
	•	Configurar o layout padrão (menu lateral ou superior).
	•	Configurar o Axios para consumir a API Laravel.
Páginas e Componentes
	•	Login/Autenticação:
	•	Tela de login para autenticar o usuário.
	•	Salvar o token JWT (se usado) para acessar a API.
	•	Usuários:
	•	Tela para listar, criar e editar usuários (somente para admins).
	•	Projetos:
	•	Tela para listar todos os projetos do usuário logado.
	•	Formulário para criar/editar projetos.
	•	Botão para excluir um projeto.
	•	Tarefas:
	•	Tela para listar tarefas de um projeto com filtros (status, prazo, etc.).
	•	Formulário para criar/editar tarefas.
	•	Botão para excluir uma tarefa.
Extras para o Frontend
	•	Relatórios:
	•	Criar gráficos com bibliotecas como Chart.js ou ApexCharts para mostrar estatísticas (ex.: tarefas por status).
	•	Notificações:
	•	Mostrar notificações quando tarefas estão próximas do prazo (ex.: Toast ou Snackbar).
	•	Estilização:
	•	Aplicar um tema responsivo e estilizado com Quasar.
Tarefas por Nível de Dificuldade
Fácil
	•	Criar e configurar o backend com as migrations.
	•	Implementar o CRUD de usuários no backend e frontend.
	•	Configurar a autenticação no frontend.
Intermediário
	•	Implementar o CRUD de projetos e tarefas.
	•	Criar relacionamentos entre tabelas (projetos :flecha_esquerda_direita: tarefas :flecha_esquerda_direita: usuários).
	•	Adicionar validações.
Avançado
	•	Implementar relatórios e gráficos.
	•	Adicionar notificações e permissões de acesso.
	•	Melhorar o desempenho com paginação e filtros avançados.