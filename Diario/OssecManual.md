# Manual de Ossec 

## ARQUITECTURA
OSSEC está compuesto de múltiples piezas:

### Gerente
Almacena las bases de datos de comprobación de integridad de archivos, los registros, los eventos y las entradas de auditoría del sistema. Todas las reglas, decodificadores y las principales opciones de configuración se almacenan centralmente en el administrador

Los agentes se conectan al servidor en el puerto 1514 / udp. Se debe permitir la comunicación a este puerto para que los agentes se comuniquen con el servidor.
	
### Agentes
El agente es un pequeño programa, o colección de programas, instalado en los sistemas a monitorear. El agente recopilará información y la enviará al gerente para su análisis y correlación.

Nota: OSSEC solo se puede instalar como agente en plataformas Microsoft Windows. Estos sistemas requerirán un servidor OSSEC, que se ejecute en Linux u otro sistema similar a Unix.

### Sin agentes
Para los sistemas en los que no se puede instalar un agente, el soporte sin agente puede permitir que se realicen verificaciones de integridad. Los escaneos sin agente se pueden usar para monitorear firewalls, enrutadores e incluso sistemas Unix.

### Virtualizacion/VMWare
OSSEC le permite instalar el agente en los sistemas operativos invitados. También se puede instalar dentro de algunas versiones de VMWare ESX.

### Firewalls, switches y routers
OSSEC puede recibir y analizar eventos de syslog de una gran variedad de firewalls, conmutadores y enrutadores.

Más información sobre la arquitectura: https://www.ossec.net/docs/docs/manual/ossec-architecture.html		
## ANALISIS Y REGRISTRO DE MONITOREO 

Se realiza dentro de OSSEC por el recolector de registros y los procesos analizados. El primero recopila los eventos y el segundo los analiza (decodifica, filtra y clasifica). OSSEC puede leer eventos desde archivos de registro internos, desde el registro de eventos de Windows y también recibirlos directamente a través de syslog remoto.

### Opciones de configuración
Estas opciones deben especificarse localmente en el archivo ossec.conf de cada agente o en el recurso compartido agent.conf. Dentro del <localfile> elemento, puede tener las siguientes opciones.
	
- <location>:
	Especifica la ubicación del registro que se leerá. Los formatos de strftime pueden usarse para nombres de archivos de registro
	Default: /var/log/messages
	Valor permitido: Cualquier fichero log
	
- <log_format> :
	El formato del registro que se lee.
	Default: syslog
	Valores permitidos:
		- syslog:
			Este formato es para archivos de texto sin formato en un formato tipo syslog. También se puede usar cuando no hay soporte para el formato de registro, y los registros son mensajes de una sola línea
		- snort-full:
			Se usa para el formato de salida completo de Snort.
		- snort-fast:
			Se usa para el formato de salida rápida de Snort.
		- squid:
		- iis:
		- eventlog:
			Se usa para el formato de registro de eventos de Microsoft Windows
		- eventchannel:
			Se usa para los registros de eventos de Microsoft Windows
		- mysql_log:
			Se usa para los registros de MySQL. No admite registros de varias líneas.
		- postgresql_log:
			Se usa para los registros de PostgreSQL. No admite registros de varias líneas.
		- nmapg:
			Se usa para monitorear archivos que se ajustan a la salida grepable de nmap .
		- apache:
			Se usa para el formato de registro predeterminado de apache
		- command:
			Este formato será el resultado del comando (como lo ejecuta la raíz) definido por el <comand>. Cada línea de salida se tratará como un registro separado. No se puede usar en agent.conf
		- full_command:
			Este formato será el resultado del comando (como lo ejecuta la raíz) definido por el <comand>. Toda la salida se tratará como un único registro. No se puede usar en agent.conf
		- djb-multilog:
		- multi-line:
			Esta opción permitirá monitorear las aplicaciones que registran varias líneas por evento. Este formato requiere que el número de líneas sea consistente. Será seguido por el número de líneas en cada entrada de registro. Cada línea se combinará con las líneas anteriores hasta que todas las líneas estén reunidas en una sola
		- multi-line_indented:
			Este formato de registro acepta registros que abarcan varias líneas con líneas posteriores que comienzan con un espacio o una pestaña.
			
- <command>:
	El comando a ejecutar. Todos los resultados de este comando se leerán como uno o más mensajes de registro dependiendo de si se usa el comando o full_command.
	Valores permitidos: Cualquier línea de comando y argumentos.
- <alias>:
	Un alias para identificar el comando. Este reemplazará el comando en el mensaje que muestre el registro.
- <frequency>:
	El tiempo mínimo en segundos entre ejecuciones de comandos. Esto se usa con command y full_command.
	Valores permitidos: Tiempo en segundos.
- <check_diff>:
	La salida de un evento se almacenará en una base de datos interna. Cada vez que se recibe el mismo evento, la salida se compara con la salida anterior. Si la salida ha cambiado, se generará una alerta.
- <only-future-events>:
	Solo se usa con el eventchannel de registro. OSSEC solo recibirá eventos que ocurrieron después del inicio de logcollector.
	Valor permitidos: Yes/No
- <query>:
	Solo se usa con el eventchannel de registro. Es posible especificar una consulta XPATH siguiendo el esquema de eventos para filtrar los eventos que procesará OSSEC.
	
### Supervisión de procesos
OSSEC agrega la capacidad de monitorear la salida de comandos y tratar la salida de esos comandos como si fueran registros. A partir de OSSEC v2.3 se puede monitorear comandos directamente en OSSEC siguiendo la configuración (/var/ossec/etc/ossec.conf)
Podemos encontrarnos algunos ejemplos en https://www.ossec.net/docs/docs/manual/monitoring/process-monitoring.html

### Monitoreo de archivos
OSSEC tiene un proceso llamado ossec-logcollectorque monitorea los archivos de registro configurados para nuevos eventos. Cuando llegan nuevos mensajes de registro, los reenvía a otros procesos para su análisis o transporte a un servidor OSSEC.
Podemos encontrarnos ejemplos de como se configura aqui: https://www.ossec.net/docs/docs/manual/monitoring/file-log-monitoring.html

Más información sobre monitorización: https://www.ossec.net/docs/docs/manual/monitoring/index.html
## SYSCHECK
Syscheck es el nombre del proceso de verificación de integridad dentro de OSSEC. Se ejecuta periódicamente para verificar si algún archivo configurado ha cambiado.
Por defecto cada 6 horas, pero la frecuencia o la hora / día son configurables. La base de datos se almacena en el gerente en /var/ossec/queue/syscheck.

### Opciones de tiempo real
ossec-syscheckdes capaz de verificar la integridad del archivo en tiempo casi real en Windows y en las distribuciones modernas de Linux. Windows viene con soporte listo para usar, pero en los sistemas Linux es posible que sea necesario instalar paquetes inotify

### Opciones de configuración
Estas opciones de configuración se pueden especificar en el archivo ossec.conf de cada agente, a excepción de auto_ignore y alert_new_file que se aplican a las instalaciones locales y de administrador. La opción ignore se aplica a todos los agentes si se especifica en el administrador.
* <directories>:
	Usar esta opción para agregar o eliminar directorios a monitorear (deben estar separados por comas). Todos los archivos y subdirectorios también serán monitoreados. Como mínimo, el '.' debe incluirse ( D:\.). Esto debe establecerse en el sistema que desea monitorear (o en agent.conf, si corresponde)
	Default: /etc,/usr/bin,/usr/sbin,/bin,/sbin
	Atributos:
		* realtime: Value=yes
			Esto permitirá el monitoreo en tiempo real / continuo en Linux (usando las llamadas al sistema de inotify) y sistemas Windows.
		* report_changes: Value=yes
			Informa diferencias de cambios de archivo. Esto está limitado a archivos de texto en este momento. Solo esta para UNIX
		* check_sha1sum: Value=yes
			Cuando se usa, solo se verificará el hash sha1 de los archivos.
		* check_md5sum: Value=yes
			Se comprobará el hash md5 de los archivos.
		* check_sum: Value=yes
			Verifique los hash md5 y sha1 de los archivos serán verificados. Esto es lo mismo que usar check_sha1sum = "yes" y check_md5sum = "yes"
		* check_size: Value=yes
			Se verificará el tamaño de los archivos.
		* check_owner: Value=yes
			Verifica el propietario de los archivos seleccionados.
		* check_group: Value=yes
			Verifica el propietario del grupo de los archivos / directorios seleccionados.
		* check_perm: Value=yes
			Verifique el permiso UNIX de los archivos / directorios seleccionados. En Windows, esto solo verificará los permisos POSIX
		* check_all: Value=yes
			Todas las siguientes opciones check_ * se usan juntas a menos que una opción específica se anule explícitamente con "no".
		* restrict: Value=string
			Una cadena que limitará las verificaciones a los archivos que contienen esa cadena en el nombre del archivo.
			Valores permitidos: cualquier directorio o nombre de archivo (pero no una ruta)
		* no_recurse: Value=no (Nuevo en la versión 3.2.)
			 No recurrir al directorio definido.
* <ignore>:
	Lista de archivos o directorios a ignorar (una entrada por elemento). Los archivos y directorios aún se verifican, pero los resultados se ignoran.
	Default: /etc/mtab
	Atributos:
		* type : Value=sregex
			Este es un patrón de expresión regular simple para filtrar archivos para que no se generen alertas.
	Valores permitidos: Cualquier nombre de directorio o fichero
* <nodiff>: Nuevo en la versión 3.0.
	Lista de archivos para no adjuntar un diff. Los archivos aún están marcados, pero no se calculan diferencias. Esto permite monitorear archivos confidenciales como la clave privada o la configuración de la base de datos sin filtrar datos confidenciales a través de alertas.
	Atributos:
		* type : Value=sregex
	Valores permitidos: Cualquier nombre de directorio o fichero
* <frequency>:
	Frecuencia de ejecución del syscheck (en segundos).
	Default: 21600
	Valores permitidos: Tiempo en segundos
* <scan_time>:
	Hora de ejecutar los escaneos (puede estar en los formatos de 21 p.m., 8:30, 12 a.m., etc.)
	Valores permitidos: Tiempo para ejecutar el escaneo
* <scan_day>:
	Día de la semana para ejecutar los escaneos (puede estar en formato de domingo, sábado, lunes, etc.)
	Valores permitidos: día de la semana
* <auto_ignore>:
	Especifica si syscheck ignorará los archivos que cambian con demasiada frecuencia (después del tercer cambio)
	Default: sí
	Valores permitidos: sí / no
	Válido: servidor, local
* <alert_new_files>:
	Especifica si syscheck debería alertar sobre los nuevos archivos creados. Los archivos nuevos solo se detectarán en un análisis completo, esta opción no funciona en tiempo real.
	Default: no
	Valores permitidos: sí / no
	Válido: servidor, local
* <scan_on_start>:
	Especifica si syscheck debe realizar el primer escaneo tan pronto como se inicie.
	Default: sí
	Valores permitidos: sí / no
* <windows_registry>:
	Usa esta opción para agregar entradas de registro de Windows que se supervisarán (solo en Windows). Las nuevas entradas no activarán alertas, solo cambios en las entradas existentes.
	Default: HKEY_LOCAL_MACHINESoftware
 	Valores permitidos: cualquier entrada de registro (una por elemento)
* <registry_ignore>:
	Lista de entradas del registro que se ignorarán.
	Default: ..CryptographyRNG
	Valores permitidos: cualquier entrada de registro (una por elemento)
* <prefilter_cmd>:
	Comando para ejecutar para evitar que la vinculación previa cree falsos positivos. Esta opción puede afectar negativamente el rendimiento. El comando configurado se ejecutará para todos y cada uno de los archivos marcados.
* <skip_nfs>: Nuevo en la versión 2.9.0.
	Especifica si syscheck debe escanear sistemas de archivos montados en red. Funciona en Linux y FreeBSD. Actualmente, skip_nfs anulará las comprobaciones que se ejecutan en montajes CIFS o NFS.
	Default: no
	Valores permitidos: sí / no
	
### Monitoreo en tiempo real
OSSEC admite monitoreo de integridad de archivos en tiempo real (continuo) en Linux (se agregó soporte kernel versión 2.6.13) y sistemas Windows. La configuración es muy simple. En la opción <directories> donde especifica qué directorios monitorear, la adición realtime="yes" lo habilitará. El monitoreo en tiempo real no comenzará de inmediato. Primero, ossec-syscheckd necesita escanear el sistema de archivos y agregar cada subdirectorio a la cola en tiempo real. Esto puede tardar un tiempo en finalizar.
El tiempo real solo funciona con directorios, no con archivos individuales.
Tanto rootcheck como syscheck se ejecutan en el mismo subproceso, por lo que cuando se ejecuta rootcheck, los eventos de inotify se ponen en cola hasta que finaliza.

### Informar cambios
OSSEC admite el envío de diferencias cuando se realizan cambios en los archivos de texto en sistemas Linux y Unix. Configurar syscheck para mostrar diffs es simple, agregue report_changes="yes"a la opción <directories>.
Informar cambios solo puede funcionar con archivos de texto, y los cambios se almacenan en el agente interno /var/ossec/queue/diff/local/dir/file.
Si OSSEC no se ha compilado con el soporte de libmagic, report_changes copiará cualquier archivo designado, por ejemplo, mp3, iso, ejecutable. Entonces, a menos que se use libmagic, tenga mucho cuidado en qué directorio habilita report_changes.

### Base de datos de la lista blanca MD5 
ossec-analysisd puede consultar una base de datos sqlite para hashes md5 conocidos. La base de datos debe contener los hashes, nombres de archivo y una fecha opcional.
Configure la base de datos en ossec.conf :
```html
</global> 
  <md5_whitelist> /rules/lists/md5whitelist.db </md5_whitelist> 
</global>
```


Más información sobre syscheck: https://www.ossec.net/docs/docs/manual/syscheck/index.html
## ROOTCHECK
Realizará la detección de rootkits en todos los sistemas donde esté instalado el agente. El rootcheck (motor de detección de rootkit) se ejecutará cada X minutos (especificado por el usuario, por defecto cada 2 horas) para detectar cualquier posible rootkit instalado

### Comprobaciones que realiza Ossec
1.	Lee el archivo rootkit_files.txt que contiene una base de datos de rootkits y archivos comúnmente utilizados por ellos. Utilizamos todas estas llamadas al sistema porque algunos rootkits a nivel de kernel ocultan archivos de algunas llamadas al sistema. Cuantas más llamadas al sistema intentemos, mejor será la detección.
2. 	Lee el rootkit_trojans.txt que contiene una base de datos de firmas de archivos troyanados por rootkits. Esta técnica de modificación de archivos binarios con versiones troyanas fue utilizada comúnmente por la mayoría de los rootkits populares disponibles. Este método de detección no encontrará ningún rootkit a nivel de kernel ni ningún rootkit desconocido.
3.	Escanea el directorio /dev buscando anomalías. El /dev solo debe tener archivos de dispositivo y el script Makedev. Muchos rootkits usan /dev para ocultar archivo
4.	Escanea todo el sistema de archivos en busca de archivos inusuales y problemas de permisos. Los archivos propiedad de root, con permiso de escritura para otros, son muy peligrosos y la detección del rootkit los buscará
5.	Busca la presencia de procesos ocultos. Usamos getsid() y kill() para verificar si se está usando cualquier pid o no
6.	Busca la presencia de puertos ocultos. Usamos bind() para verificar cada puerto tcp y udp en el sistema
7.	Escanea todas las interfaces en el sistema y busque las que tengan habilitado el modo "promisc". Si la interfaz está en modo promisc, la salida de "ifconfig" debería mostrar eso. Si no, probablemente tengamos un rootkit instalado.	
	
### Opciones de configuración
Estas opciones de configuración se pueden especificar en el archivo ossec.conf de cada agente, a excepción de auto_ignore y alert_new_file que se aplican a las instalaciones locales y de administrador. La opción ignore se aplica a todos los agentes si se especifica en el administrador.
* <base_directory>:
	El directorio base que se agregará a las siguientes opciones:
		* rootkit_files
		* rootkit_trojans
		* windows_malware
		* windows_audit
		* windows_apps
		* sistemas_auditoría
	Valores permitidos: ruta a un directorio
	Default: /var/ossec
* <rootkit_files>:
	Esta opción se puede usar para cambiar la ubicación de la base de datos de los archivos rootkit.
	Valores permitidos: un archivo con las firmas de los archivos rootkit
	Default: /etc/shared/rootkit_files.txt
* <rootkit_trojans>:
	Esta opción se puede usar para cambiar la ubicación de la base de datos de troyanos rootkit.
	Valores permitidos: un archivo con las firmas de los troyanos
	Default: /etc/shared/rootkit_trojans.txt
* <windows_audit>:
* <system_audit>:
* <windows_apps>:
* <windows_malware>:
* <scanall>:
	Le dice a rootcheck que escanee todo el sistema (puede dar lugar a algunos falsos positivos).
	Default: no
	Valores permitidos: sí / no
* <frequency>
	Frecuencia con la que se va a ejecutar el rootcheck (en segundos).
	Default: 36000 (10 horas)
	Valores permitidos: Tiempo (en segundos)
* <disabled>
	Deshabilita la ejecución de rootcheck.
	Default: no
	Valores permitidos: sí / no
* <check_dev>
	Activa o desactiva la comprobación de archivos en el sistema de archivos /dev
	Default: si
	Valores permitidos: sí / no
* <check_files>
	Habilita o deshabilita la comprobación basada en los archivos rootkit
	Default: si
	Valores permitidos: sí / no
* <check_if>	
	Activar o desactivar la comprobación de las interfaces de red.
	Default: si
	Valores permitidos: sí / no
* <check_pids>
	Habilitar o deshabilitar la comprobación de ID de proceso
	Default: si
	Valores permitidos: sí / no
* <check_ports>
	Activa o desactiva la comprobación de los puertos de red.
	Default: si
	Valores permitidos: sí / no
* <check_sys>
	Activa o desactiva la comprobación del sistema de archivos en busca de posibles problemas
	Default: si
	Valores permitidos: sí / no
* <check_trojans>
	Habilita o deshabilita la comprobación de troyanos.
	Default: sí
	Valores permitidos: sí / no
* <check_unixaudit>
	Habilitar o deshabilitar la comprobación de problemas de Unix
	Default: sí
	Valores permitidos: sí / no
* <check_winapps>
	Habilitar o deshabilitar la comprobación de aplicaciones de Windows
	Default: sí
	Valores permitidos: sí / no
* <check_winaudit>
	Habilitar o deshabilitar la comprobación de problemas de Windows
	Default: 1
	Valores permitidos: 1 / 0
* <check_winmalware>
	Active o desactive la comprobación de malware de Windows.
	Default: sí
	Valores permitidos: sí / no
* <skip_nfs> Nuevo en la versión 2.9.0.
	Especifica si rootcheck debe escanear sistemas de archivos montados en red. Funciona en Linux y FreeBSD. Actualmente, skip_nfs anulará las comprobaciones que se ejecutan en montajes CIFS o NFS.
	Default: no
	Valores permitidos: sí / no

### Recepción de alertas de auditoría y aplicación por correo electrónico
De manera predeterminada, tanto la auditoría de políticas como las verificaciones de aplicaciones se registran como nivel 3, por lo que no recibirá ninguna alerta por correo electrónico con la configuración original.
Si desea recibir alertas por correo electrónico para cualquiera (o los dos) tipos de eventos, debe crear reglas locales con una mayor gravedad o con la opción alert_by_email


Más información sobre rootcheck: https://www.ossec.net/docs/docs/manual/rootcheck/index.html
## REGLAS Y DECODERS


### Prueba de reglas / decodificadores OSSEC
El primer problema que tiene la mayoría de las personas al solucionar problemas de OSSEC o al intentar escribir nuevas reglas y decodificadores es cómo probarlos. A partir de la versión 1.6, existe una herramienta para simplificar esta tarea (ossec-logtest).
Para ver un ejemplo de como probarlo lo podéis encontrar en https://www.ossec.net/docs/docs/manual/rules-decoders/testing.html

### Busquedas de listas CDB dentro de las reglas.
Permite búsquedas de CDB desde dentro de las reglas en OSSEC (ossec-analysisd) de todos los campos posibles.

### Sintaxis para listas CDB

* Reglas
	Una regla usaría la siguiente sintaxis para buscar una clave dentro de una base de datos CDB:
		```html
		<list  field = "" otros atributos>  reglas/registros </list>
		```
* ossec.conf 
	Cada lista necesitará ser definida y se le pedirá que esté disponible usando el archivo ossec.conf. Usando la siguiente sintaxis:
		```html
		<ossec_config> 
			<rules> 
				<list> reglas / registros </list>
		```
* Comandos 
	Los archivos CDB deben compilarse antes de que puedan usarse. El comando ossec-makelists procesará y compilará todas las listas si se han cambiado las reglas del texto maestro
* Formato de archivo de texto de lista
	Será en formato clave:valor


Más información sobre reglas y decoders: https://www.ossec.net/docs/docs/manual/rules-decoders/index.html
