# Projeto de Notificações Push com Expo e PHP

Este projeto é um exemplo de como implementar notificações push em um aplicativo móvel criado com Expo e como receber e processar os tokens de notificação no servidor PHP. As notificações push permitem enviar mensagens importantes e atualizações para os usuários, mesmo quando o aplicativo não está em primeiro plano.

O servidor PHP é responsável por receber os tokens de notificação push enviados pelos dispositivos Expo e, em seguida, usa a biblioteca ExponentPhpSDK para enviar notificações push para os dispositivos registrados.

## Funcionalidades

- Obtenção do token de notificação push do dispositivo Expo.
- Envio de tokens de notificação do aplicativo Expo para o servidor PHP.
- Processamento dos tokens recebidos no servidor para enviar notificações push.


### Pré-requisitos

Certifique-se de ter o seguinte instalado em seu ambiente de desenvolvimento:
- PHP (https://www.php.net/manual/en/install.php)
- Composer (https://getcomposer.org/)
- Docker (https://www.docker.com/get-started)
- Slim framework  (https://www.slimframework.com/docs/v4/objects/response.html#the-response-status)

## Exemplo:

```json
POST https://notification-r9w4.onrender.com/notify HTTP/1.1
Content-Type: application/json
{
	"token": "ExponentPushToken[token do aplicativo]",
	"channelName": "opcional",
	"title": "texto",
	"message": "testando push notify"
}
```
