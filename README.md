# Hids

## Instalación

usuario@ubuntu-18:~/3.1.0/**ossec-hids-3.1.0**$ sudo ./install.sh

  * Para instalação em português, escolha [br].
  * 要使用中文进行安装, 请选择 [cn].
  * Fur eine deutsche Installation wohlen Sie [de].
  * Για εγκατάσταση στα Ελληνικά, επιλέξτε [el].
  * For installation in English, choose [en].
  * Para instalar en Español , eliga [es].
  * Pour une installation en français, choisissez [fr]
  * A Magyar nyelvű telepítéshez válassza [hu].
  * Per l'installazione in Italiano, scegli [it].
  * 日本語でインストールします．選択して下さい．[jp].
  * Voor installatie in het Nederlands, kies [nl].
  * Aby instalować w języku Polskim, wybierz [pl].
  * Для инструкций по установке на русском ,введите [ru].
  * Za instalaciju na srpskom, izaberi [sr].
  * Türkçe kurulum için seçin [tr].
  
  **(en/br/cn/de/el/es/fr/hu/it/jp/nl/pl/ru/sr/tr) [en]: es**

 OSSEC HIDS v3.1.0 Guión de instalación - http://www.ossec.net

  - Sistema: Linux ubuntu-18 4.15.0-76-generic
  - Usuario: root
  - servidor: ubuntu-18


### 1- Que tipo de instalación desea (servidor, agente, local ó ayuda)? ayuda

  - Tiene tres posibilidades de instalación: servidor, 
    agente ó local.

    - Si elige 'servidor' será capaz de analizar todo  los registros, 
      crear  notificaciónes de correo y respuestas, así como también 
      recibir registros desde equipos syslog  remotos y otros sistemas  
      ejecutando  el  'agente' (que transmitirá el tráfico cifrado hacia el servidor).
       
    - Si elige 'agente'(cliente) será capaz de leer
      registros  locales (syslog, snort, apache, etc) y
      retrasmitirlos al servidor de analysis.

    - Si elige 'local' será capaz de todo lo que hace 
      la instalación de 'servidor', excepto recibir mensajes remotos de los
      agentes ó fuentes externas de syslog.

    - Elija 'servidor' si desea instalar un servidor de registros
      ó análisis.

    - Elija 'agente' si dispone de otra máquina ejecutando el servidor
      de lectura de registros y desea transmitir los registros para su
      análisis. (ideal para servidore WEB, base de datos, etc)

    -Elija 'local' si tiene que monitorizar un solo sistema .

  - Para más información dirijase a:
    http://www.ossec.net/en/manual.html#starting

  
**1- Que tipo de instalación desea (servidor, agente, local ó ayuda)? local**


 **2- Configurando las variables de entorno de la instalación.**

 - Eliga donde instalar OSSEC HIDS [/var/ossec]: /var/ossec

    - La instalación se realizará en  /var/ossec .

3- Configurando el sistema OSSEC HIDS.

  3.1- Desea recibir notificación por correo electrónico? (s/n) [s]: s
   - Cuál es su dirección de correo electrónico? tfghids@gmail.com

   - Hemos encontrado su servidor de correo (SMTP): alt4.gmail-smtp-in.l.google.com.
   - Desea usarlo? (s/n) [s]: s

   --- Usando el servidor SMTP:  alt4.gmail-smtp-in.l.google.com.

  3.2- Desea Usted agregar el servidor de integridad del sistema? (s/n) [s]: s

   - Ejecutando syscheck (servidor de integridad del sistema).

  3.3- Desea Usted agregar el sistema de detección de rootkit? (s/n) [s]: s

   - Ejecutando rootcheck (sistema de detección de rootkit).

  3.4- Las respuestas activas le permitirán ejecutar un comando
       específico en base a los eventos recibidos. Por ejemplo,
       Usted podra bloquear una dirección IP ó deshabilitar el acceso
       de un usuario específico.
       Más información en:
       http://www.ossec.net/en/manual.html#active-response

   - Desea habilitar respuesta activa? (s/n) [s]: s


     - Respuesta activa habilitada.

   - Por omisión podemos habilitar el bloqueo del servicio 
     o el descarte del paquete por medio del Firewall.
     El bloqueo del servicio agregará al atacante en el archivo etc/hosts.deny
     y el decarte del paquete añadirá la regla en iptables
     (si el sistema fuera linux) ó ipfilter (si el sistema fuera
     Solaris, FreeBSD or NetBSD).

    - Las dos repuestas pueden ser utilizadas para detener un escaneo 
      de fuerza bruta contra SSHD, escaneo de puertos y otras formas
      de ataque. Por ejemplo se podrá agregar a los atacantes
      de acuerdo a eventos registrados por medio de snort.


   - Desea habilitar la respuesta desechar en el Firewall? (s/n) [s]: s

     - Respuesta desechar en el Firewall habilitada (local)  para niveles >= 6

   - Lista blanca para respuesta activa por omisión:
      - 127.0.0.53

   - Desea Usted agregar más IPs a la lista blanca? (s/n)? [n]: n

  3.6- Estableciendo la configuración para analizar los siguientes registros:
    -- /var/log/auth.log
    -- /var/log/syslog
    -- /var/log/dpkg.log
    -- /var/log/apache2/error.log (apache log)
    -- /var/log/apache2/access.log (apache log)


 - Si desea monitorizar algún otro registro, solo
   tendrá que editar el archivo ossec.conf y agregar una
   nueva entrada de tipo localfile.
   Cualquier otra pregunta de configuración podrá ser 
   respondida visitandonos en linea en http://www.ossec.net .
   
   --- Presione ENTER para continuar ---
                            


5- Instalando el sistema

 - El sistema es Debian (Ubuntu or derivative).
 - Init script modificado para empezar OSSEC HIDS durante el arranque.

 - Configuración finalizada correctamente.

 - Para comenzar OSSEC HIDS:
      /var/ossec/bin/ossec-control start

 - Para detener OSSEC HIDS:
      /var/ossec/bin/ossec-control stop

 - La configuración puede ser leída ó mofificada en /var/ossec/etc/ossec.conf

    
    Gracias por usar OSSEC HIDS.
    Si tiene alguna duda, sugerencia ó encuentra 
    algún desperfecto, contacte con nosotros en contact@ossec.net
    ó usando nuestrs lista pública de correo en ossec-list@ossec.net
    
    Más información puede ser encontrada en http://www.ossec.net
    
           ---  Presione ENTER para finalizar. ---
       (Tal vez encuentre más información a continuación). 

