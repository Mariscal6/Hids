# HIDS

## Instalación OSSEC

- Primero, debemos de instalar los programas de los que depende OSSEC, como PHP, gcc, libc y Apache. Para ello ejecutamos desde la
   terminal los siguientes comandos:
   
   `sudo apt install -y wget unzip make gcc build-essential`
   
   `sudo apt install -y php php-cli php-common libapache2-mod-php apache2-utils sendmail inotify-tools`

- Procedemos a instalar OSSEC, ejecutando en la terminal nuevamente los siguientes comandos:

   `export VER="3.1.0"`
   
   `wget https://github.com/ossec/ossec-hids/archive/${VER}.tar.gz`
   
- Extraemos en el directorio que queramos el archivo, y desde el terminal, en el directorio de instalación, ejectuamos:

   `sudo sh install.sh`

- Seguir los pasos de instalación que te indique el programa, empezando por elegir el idioma (nosostros lo hemos instalado en español).
  Estos son los pasos que hemos tomado nosotros. Aconsejamos leer siempre lo que nos pone en el terminal antes de tomar una decisión.

### Elige el idioma de instalación.

`> es`

### ¿Qué tipo de instalación desea (servidor, agente, local ó ayuda)? 

`> local`


### Elija donde instalar OSSEC HIDS [/var/ossec]:

`> /var/ossec`

### ¿Desea recibir notificación por correo electrónico? (s/n) [s]: 

`> s`

### ¿Cuál es su dirección de correo electrónico? 

`> correo@ejemplo.com`

### Hemos encontrado su servidor de correo (SMTP): alt4.gmail-smtp-in.l.google.com. ¿Desea usarlo? (s/n) [s]: 

`> s`
     
### ¿Desea Usted agregar el servidor de integridad del sistema? (s/n) [s]: 

`> s`

### ¿Desea Usted agregar el sistema de detección de rootkit? (s/n) [s]:

`> s`

### ¿Desea habilitar respuesta activa? (s/n) [s]:

`> s`

### ¿Desea habilitar la respuesta desechar en el Firewall? (s/n) [s]:

`> s`

### ¿Desea Usted agregar más IPs a la lista blanca? (s/n)? [n]:

`> n`

### Ahora debería de aparecer la configuración de los directorios para los logs de OSSEC:

`Estableciendo la configuración para analizar los siguientes registros:`

`-- /var/log/auth.log`

`-- /var/log/syslog`

`-- /var/log/dpkg.log`

`-- /var/log/apache2/error.log (apache log)`

`-- /var/log/apache2/access.log (apache log)`

`...`

### Cuando todo esté configurado, deberían de aparecernos los siguientes mensajes:

`- Configuración finalizada correctamente.`

`- Para comenzar OSSEC HIDS:`

   `/var/ossec/bin/ossec-control start`
   
`- Para detener OSSEC HIDS:`

   `var/ossec/bin/ossec-control stop`
   
`- La configuración puede ser leída ó mofificada en /var/ossec/etc/ossec.conf`

