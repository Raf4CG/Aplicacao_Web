import mysql.connector
import json

# Conecta ao banco de dados MySQL 
conn = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='formulario'
)
cursor = conn.cursor()

# Cria uma tabela para armazenar os dados do formulário
cursor.execute('''CREATE TABLE IF NOT EXISTS formulario (
                  id INT AUTO_INCREMENT PRIMARY KEY,
                  nome VARCHAR(255),
                  telefone VARCHAR(20),
                  cpf VARCHAR(11),
                  email VARCHAR(255),
                  credito FLOAT,
                  renda FLOAT)''')

# Recebe dados do formulário 
nome = 'Exemplo Nome'
telefone = '123456789'
cpf = '12345678901'
email = 'exemplo@example.com'
credito = 1000.00
renda = 500.00

# Insere dados na tabela do banco de dados
cursor.execute('INSERT INTO formulario (nome, telefone, cpf, email, credito, renda) VALUES (%s, %s, %s, %s, %s, %s)',
               (nome, telefone, cpf, email, credito, renda))

# Para o commit e fecha a conexão com o banco de dados
conn.commit()
conn.close()

# Lê os dados do banco de dados e salvar em um arquivo JSON
conn = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='formulario'
)
cursor = conn.cursor()

# Seleciona os dados da tabela do banco de dados
cursor.execute('SELECT * FROM formulario')
dados = cursor.fetchall()

# Cria uma lista de dicionários com os dados
dados_json = []
for linha in dados:
    id, nome, telefone, cpf, email, credito, renda = linha
    dados_json.append({
        'id': id,
        'nome': nome,
        'telefone': telefone,
        'cpf': cpf,
        'email': email,
        'credito': credito,
        'renda': renda
    })

# Caminho para salvar o arquivo JSON
caminho_arquivo_json = r'C:\xampp\htdocs\aplicacao_web\dados_formulario.json'

# Salva os dados em um arquivo JSON no caminho especificado
with open(caminho_arquivo_json, 'w') as arquivo_json:
    json.dump(dados_json, arquivo_json)

# Fecha a conexão com o banco de dados
conn.close()
