# Symfony, Traefik, n8n, Ollama & RabbitMQ with Docker


https://github.com/user-attachments/assets/383f1fb8-ebf0-42e2-bcb0-677aaab64f1a


Welcome to **Symfony-n8n-OpenAI Events**! This project leverages the power of Symfony, n8n, Ollama and AI agents to automatically create, process, and share event information. Our AI Agent now handles data insertion into PostgreSQL, eliminating repetitive tasks and bringing automation magic—enhanced by intelligent bots and a touch of humor!

## Why Automation, n8n, and AI Agents?
![image](https://github.com/user-attachments/assets/5ea2b825-285f-40c3-91ae-aefa9fe45e0d) <br>
Imagine a world where your boring tasks are handled by tireless digital minions—no coffee breaks needed! That’s exactly what **n8n** offers: an open-source automation platform that connects your apps and services seamlessly. In this project, when an event is created:


- It is processed by a series of AI-driven steps that generate detailed descriptions,
- Translate them into Arabic and English,
- Prepare the final data for insertion,
- And, thanks to our AI Agent SQL, insert the data into PostgreSQL.
- Finally, the event is shared on Telegram for the world to see.


This repository provides a fully functional Docker-based setup for a Symfony application integrated with Traefik, n8n, RabbitMQ, PostgreSQL, Redis, and OpenUI. The system allows seamless event processing using AI automation.

## 🚀 Features
- **Symfony** with PHP 8.2 (FPM)
- **PostgreSQL** database with **pgAdmin**
- **RabbitMQ** for event-driven processing
- **Redis** for caching
- **n8n** for workflow automation
- **Traefik** as a reverse proxy and automatic SSL management
- **OpenUI with Ollama** for AI-powered operations

## 🛠 Requirements
- **Docker** & **Docker Compose**
- **Internet connection** for initial setup

## 📦 Installation
1. **Clone the repository**:
      ```bash
   git clone https://github.com/SalemSaiid/symfony-n8n-ai-ollama-events
       cd symfony-n8n-ai-ollama-events
   ```
2. **Create a `.env` file** and configure environment variables if needed.
3. **Start the services**:
   ```bash
   docker-compose up -d
   ```
4. **Access services**:
   - **Symfony API** → `http://symfony.127.0.0.1.nip.io`
   - **Traefik Dashboard** → `http://traefik.127.0.0.1.nip.io`
   - **n8n** → `https://n8n.127.0.0.1.nip.io`
   - **OpenUI** → `http://openui.127.0.0.1.nip.io`
   - **RabbitMQ** → `http://rabbitmq.127.0.0.1.nip.io`
   - **pgAdmin** → `http://pgadmin.127.0.0.1.nip.io`

## 📌 Usage

### 📝 Creating an Event
To create a new event, send a `POST` request to your Symfony API. Example using **cURL** or **Postman**:

```bash
POST http://localhost/api/event
Content-Type: application/json

{
    "startDate": "2025-06-04 12:00",
    "endDate": "2025-06-04 18:00",
    "shortDescription": "EVENT Paris: IT DEVOPS"
}
```

## 🔄 What happens next?

Once an event is created, an automated workflow is triggered. Here’s what happens step by step:

1. **Database Insertion (PostgreSQL)**  
   - The Symfony API assigns a unique **ID** to the event.  
   - The event is **inserted into the PostgreSQL database** with an empty detailed description.

2. **Message Dispatching (RabbitMQ)**  
   - A message with event data is **sent to RabbitMQ**.  
   - This message **triggers the n8n workflow** for further processing.

3. **Workflow Execution (n8n Automation)**  
   - The n8n workflow **receives the RabbitMQ message**.  
   - It **generates a detailed event description** using **AI-powered automation**.  
   - The description is **translated into multiple languages** (if needed).  
   - The **processed event data** is prepared for database insertion.

4. **AI-Assisted Data Processing**  
   - The **AI Agent SQL** structures and updates the event with a **rich description**.  
   - The enriched event is **saved into PostgreSQL**.

5. **Event Distribution**  
   - The final event details are **shared in a Telegram channel, Slack & Gmail**.  
   - Future enhancements can include **Elasticsearch indexing** or **email notifications**.

### 🔍 Get Events
To fetch all events from the API, use:

```bash
GET http://localhost/api/events
```

## 🛑 Stopping the Services
To **stop and remove** all containers:

```bash
docker-compose down
```

## 🤝 Contributing
Feel free to **submit pull requests** or **suggest improvements** for this setup!

## 📜 License
This project is open-source and available under the **MIT License**.






