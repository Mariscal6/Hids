# Entendiendo el código 

## index.php

* Siempre se mantiene en la misma dirección, solo que cambia el contenido del body según los parámetros recibidos por GET.
	* $GET['f'] = 's' : 
		Que cargaría [site/search.php](#sitesearchphp)
	* $GET['f'] = 'sf' : 
		Que cargaría [site/searchfw.php](#sitesearchfwphp)
	* $GET['f'] = 'm' : 
		Que cargaría [site/main.php](#sitemain.php)
	* $GET['f'] = 'u' : 
		Que cargaría [site/user_mapping.php](#siteuser_mappingphp)
	* $GET['f'] = 't' : 
		Que cargaría [site/stats.php](#sitestatsphp)
	* $GET['f'] = 'a' : 
		Que cargaría [site/help.php](#sitehelpphp)
	* $GET['f'] = 'i' : 
		Que cargaría [site/syscheck.php](#sitesyscheckphp)

### site/search.php

1. Comprueba variables recibidas mediante POST, inicializa  variables(alamacenadas en [ossec_conf.php](#ossec_confphp)) y crea un handler(`handler_start($div)`).

2. Imprime formularios de búsqueda: que cuando realizas un submit llama a la misma visat sólo que pasándole las variables del formulario de búsqueda.

3. Llama [`function os_searchalerts()`](##ossec_lib_alertsphp), y si ponemos algún filtro se lo aplica.

4. También usa las categorías definidas en ossec_categories.php y en ossec_formats.php.



### site/searchfw.php

1. Comprueba variables recibidas mediante POST, inicializa  variables(alamacenadas en [ossec_conf.php](#ossec_confphp)) y crea un handler(`handler_start($div)`).

2. Imprime formularios de búsqueda: que cuando realizas un submit llama a la misma visat sólo que pasándole las variables del formulario de búsqueda.

3. Llama [`function os_searchfw()`](#ossec_lib_firewallphp), y si ponemos algún filtro se lo aplica

### site/main.php

1. Comprueba variables recibidas mediante POST, inicializa  variables(alamacenadas en [ossec_conf.php](#ossec_confphp)) y crea un handler(`handler_start($div)`).

2. Imprime formularios de búsqueda: que cuando realizas un submit llama a la misma visat sólo que pasándole las variables del formulario de búsqueda.

3. Llama a las funciones : 
	1. [`os_getagents($ossec_handle)`](#ossec_lib_agentphp)
	2. [`os_getsyscheck($ossec_handle)`](#ossec_sys_checkphp)
	3. [`os_getalerts($ossec_handle, 0, 0, 30)`](#ossec_lib_alertsphp)
)

### site/user_mapping.php

### site/stats.php

1. Comprueba variables recibidas mediante POST, inicializa  variables(alamacenadas en [ossec_conf.php](#ossec_confphp)) y crea un handler(`handler_start($div)`).

2. Imprime formularios de búsqueda: que cuando realizas un submit llama a la misma visat sólo que pasándole las variables del formulario de búsqueda.

3. Llama a las funcion : 
> [`os_getstats($ossec_handle, $init_time, $final_time)`](#ossec_lib_statsphp)

### site/help.php

Información irrelevante y escasa. Licencia GNU.

### site/syscheck.php

1. Comprueba variables recibidas mediante POST, inicializa  variables(alamacenadas en [ossec_conf.php](#ossec_confphp)) y crea un handler(`handler_start($div)`).

2. Imprime formularios de búsqueda: que cuando realizas un submit llama a la misma visat sólo que pasándole las variables del formulario de búsqueda.

3. Llama a las funciones: 
> [`os_getsyscheck($ossec_handle);`](##ossec_sys_checkphp)
> [`os_syscheck_dumpdb($ossec_handle, $agent_name`](#ossec_lib_alertsphp)).

### Funciones 

#### ossec_conf.php
Declara las variables:

> 1. Directorio ossec.
> 2. Máximo de alertas por paquete.
> 3. Tiempo de refresco.
> 4. Nivel de búsqueda.
> 5. Tiempo de búsqueda máximo.

#### ossec_categories.php
Declara un diccionario con categorías y subcategorías.

```php
$global_categories = array(

	// Reconnaissance categories
	"Reconnaissance"           => array(
		"Reconnaissance (all)"         => "connection_attempt|web_scan|recon"
	,	"Connection attempt"           => "connection_attempt"
	,	"Web scan"                     => "web_scan"
	,	"Generic scan"                 => "recon"
	),

	// Authentication control categories
	"Authentication Control"   => array(
		"Authentication Control (all)" => "authentication|invalid_login|adduser|policy_changed|account_changed"
	,	"Authentication Success"       => "authentication_success"
	,	"Authentication Failure"       => "authentication_failed"
	,	"Invalid login"                => "invalid_login"
	,	"Multiple auth failures"       => "authentication_failures"
	,	"User account modified"        => "adduser|account_changed"
	,	"Policy changed"               => "policy_changed"
	),

	// Attack
	"Attack/Misuse"            => array(
		"Attack/Misuse (all)"          => "exploit_attempt|invalid_access|attack|spam|sql_injection|rootcheck"
	,	"Worm"                         => "automatic_attack"
	,	"Virus"                        => "virus"
	,	"Automatic attack"             => "automatic_attack"
	,	"Exploit pattern"              => "exploit_attempt"
	,	"Invalid access"               => "invalid_access"
	,	"Spam"                         => "spam"
	,	"Multiple Spams"               => "multiple_spam"
	,	"SQL Injection"                => "sql_injection"
	,	"Generic Attack"               => "attack"
	,	"Rootkit detection"            => "rootcheck"
	),

	// Access control
	"Access Control"           => array(
		"Access Control (all)"         => "access|unknown_resource|drop|client"
	,	"Access denied"                => "access_denied"
	,	"Access allowed"               => "access_allowed"
	,	"Invalid access"               => "unknown_resource"
	,	"Firewall Drop"                => "firewall_drop"
	,	"Multiple fw drops"            => "multiple_drops"
	,	"Client mis-configuration"     => "client_misconfig"
	,	"Client error"                 => "client_error"
	),

	// Network control
	"Network Control"          => array(
		"Network Control (all)"        => "new_host|ip_spoof"
	,	"New host detected"            => "new_host"
	,	"Possible ARP spoof"           => "ip_spoof"
	),                  

	// System monitor
	"System Monitor"           => array(
		"System Monitor (all)"         => "service|system|logs|invalid_request|promisc|syscheck|config_changed"
	,	"Service start"                => "service_start"
	,	"Service in Risk"              => "service_availability"
	,	"System error"                 => "system_error"
	,	"Shutdown"                     => "system_shutdown"
	,	"Logs removed"                 => "logs_cleared"
	,	"Invalid request"              => "invalid_request"
	,	"Promiscuous mode detected"    => "promisc"
	,	"Configuration changed"        => "config_changed"
	,	"Integrity Checking"           => "syscheck"
	,	"File modification"            => "syscheck"
	),

	// Policy violation
	"Policy Violation"         => array(
		"Policy Violation (all)"       => "login_"
	,	"Login time violation"         => "login_time"
	,	"Login day violation"          => "login_day"
	)                  

);
```

#### ossec_formats.php
Declara un diccionario con categorias y eventos.

```php 
log_categories = array(
	"Syslog" => array(
		"Syslog (all)"           => "syslog"
	,	"Sshd"                   => "sshd"
	,	"Arpwatch"               => "arpwatch"
	,	"Ftpd"                   => "ftpd"
	,	"Pam Unix"               => "pam"
	,	"Proftpd"                => "proftpd"
	,	"Pure-ftpd"              => "pure-ftpd"
	,	"Vsftpd"                 => "vsftpd"
	,	"Sendmail"               => "sendmail"
	,	"Postfix"                => "postfix"
	,	"Imapd"                  => "imapd"
	,	"Vpopmail"               => "vpopmail"
	,	"Spamd"                  => "spamd"
	,	"Horde IMP"              => "horde"
	,	"Smbd"                   => "smbd"
	,	"NFS"                    => "nfs"
	,	"Xinetd"                 => "xinetd"
	,	"Kernel"                 => "kernel"
	,	"Su"                     => "su"
	,	"Cron"                   => "cron"
	,	"Sudo"                   => "sudo"
	,	"PPTP"                   => "pptp"
	,	"Named"                  => "named"
	),

	"Firewall" => array(
		"Firewall"               => "firewall|pix"
	,	"Pix"                    => "pix"
	,	"Netscreen"              => "netscreenfw"
	),

	"Microsoft" => array(
		"Microsoft (all)"        => "windows|msftp|exchange"
	,	"Windows"                => "windows"
	,	"MS Ftp"                 => "msftp"
	,	"Exchange"               => "exchange"
	),

	"Web logs" => array(
		"Web logs (all)"         => "web-log"
	),

	"Squid" => array(
		"Squid (all)"            => "squid"
	),

	"Security devices" => array(
		"Security devices (all)" => "symantec|cisco_vpn|ids"
	,	"Cisco VPN"              => "Cisco VPN"
	,	"Symantec AV"            => "symantec"
	,	"NIDS"                   => "ids"
	)

);
```

#### ossec_handle.php
```php 
function os_check_config($ossec_dir, $ossec_max_alerts_per_page,$ossec_search_level, $ossec_search_time,$ossec_refresh_time)
```

> Comprueba que la configuracion de [ossec_conf.php](#ossec_confphp) es correcta.

```php 
function os_handle_start($dir)
```
> Crea un directorio (_DIR_/queue/agent_info)y un objeto manejador.

#### ossec_lib_agent.php
```php 
function os_getagents($ossec_handle)
```
> Nos devuelve información de nuestros distintos agentes e info adicional.
>> 1. IP
>> 2. Operating system.
>> 3. Name.
>> 4. Tiempo desde el último cambio.
>> 5. Si está conectado.
#### ossec_lib_mapping.php
#### ossec_lib_stats.php
```php
function os_getstats($ossec_handle, 
                     $init_time, $final_time)
```
> Mira en stats/totals/fecha y parsea todo los eventos entra estas dos fechas, te devuelve una lista con estos.

#### ossec_sys_check.php
```php 
 function os_getsyscheck($ossec_handle) || function os_syscheck_dumpdb($ossec_handle, $agent_name)
```
> Mira en /queue/syscheck y o bien parsea todos los syschecks de todos los agents o de uno en concreto.

#### ossec_lib_firewall.php
```php
function os_searchfw($ossec_handle, $search_id,
                     $init_time, $final_time,
                     $max_count, $protocol_pattern,
                     $srcip_pattern, $dstip_pattern,
                     $srcport_pattern, $dstport_pattern,
                     $action_pattern, $location_pattern) 
```
> Devuelve una lista de alertas de firewall basadas en las variables dadas si esque estan definidas. Las busca en logs/firewall/ossec-firewall.

#### ossec_lib_alerts.php
```php
function os_searchalerts($ossec_handle, $search_id,
                         $init_time, $final_time, 
                         $max_count,
                         $min_level,
                         $rule_id,
                         $location_pattern,
                         $str_pattern,
                         $group_pattern,
                         $srcip_pattern,
                         $user_pattern,
                         $log_pattern)
```
> Devuelve una lista de alertas basadas en las variables dadas si esque estan definidas. Las busca en logs/Alerts/alert.log.

>> Hace uso de la clase AlertList (muy pobre)
