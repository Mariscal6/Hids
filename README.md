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

**3- Configurando el sistema OSSEC HIDS.**

    3.1- Desea recibir notificación por correo electrónico? (s/n) [s]: s
         - Cuál es su dirección de correo electrónico? tfghids@gmail.com

         - Hemos encontrado su servidor de correo (SMTP): alt4.gmail-smtp-in.l.google.com.
         - Desea usarlo? (s/n) [s]: s



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
 - Ejecutando el Makefile
    CC external/cJSON/cJSON.o
    LINK libcJSON.a
    RANLIB libcJSON.a
cd external/zlib-1.2.11/ && ./configure && make libz.a
Checking for gcc...
Checking for shared library support...
Building shared library libz.so.1.2.11 with gcc.
Checking for size_t... Yes.
Checking for off64_t... Yes.
Checking for fseeko... Yes.
Checking for strerror... Yes.
Checking for unistd.h... Yes.
Checking for stdarg.h... Yes.
Checking whether to use vs[n]printf() or s[n]printf()... using vs[n]printf().
Checking for vsnprintf() in stdio.h... Yes.
Checking for return value of vsnprintf()... Yes.
Checking for attribute(visibility) support... Yes.
make[1]: se entra en el directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/zlib-1.2.11'
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o adler32.o adler32.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o crc32.o crc32.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o deflate.o deflate.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o infback.o infback.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o inffast.o inffast.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o inflate.o inflate.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o inftrees.o inftrees.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o trees.o trees.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o zutil.o zutil.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o compress.o compress.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o uncompr.o uncompr.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o gzclose.o gzclose.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o gzlib.o gzlib.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o gzread.o gzread.c
gcc -O3 -D_LARGEFILE64_SOURCE=1 -DHAVE_HIDDEN  -c -o gzwrite.o gzwrite.c
ar rc libz.a adler32.o crc32.o deflate.o infback.o inffast.o inflate.o inftrees.o trees.o zutil.o compress.o uncompr.o gzclose.o gzlib.o gzread.o gzwrite.o 
make[1]: se sale del directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/zlib-1.2.11'
cd external/lua-5.2.3/ && make posix
make[1]: se entra en el directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3'
cd src && make posix
make[2]: se entra en el directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3/src'
make all SYSCFLAGS="-DLUA_USE_POSIX"
make[3]: se entra en el directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3/src'
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lapi.o lapi.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lcode.o lcode.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lctype.o lctype.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o ldebug.o ldebug.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o ldo.o ldo.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o ldump.o ldump.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lfunc.o lfunc.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lgc.o lgc.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o llex.o llex.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lmem.o lmem.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lobject.o lobject.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lopcodes.o lopcodes.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lparser.o lparser.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lstate.o lstate.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lstring.o lstring.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o ltable.o ltable.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o ltm.o ltm.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lundump.o lundump.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lvm.o lvm.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lzio.o lzio.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lauxlib.o lauxlib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lbaselib.o lbaselib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lbitlib.o lbitlib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lcorolib.o lcorolib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o ldblib.o ldblib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o liolib.o liolib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lmathlib.o lmathlib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o loslib.o loslib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lstrlib.o lstrlib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o ltablib.o ltablib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o loadlib.o loadlib.c
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o linit.o linit.c
ar rcu liblua.a lapi.o lcode.o lctype.o ldebug.o ldo.o ldump.o lfunc.o lgc.o llex.o lmem.o lobject.o lopcodes.o lparser.o lstate.o lstring.o ltable.o ltm.o lundump.o lvm.o lzio.o lauxlib.o lbaselib.o lbitlib.o lcorolib.o ldblib.o liolib.o lmathlib.o loslib.o lstrlib.o ltablib.o loadlib.o linit.o 
ar: `u' modifier ignored since `D' is the default (see `U')
ranlib liblua.a
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o lua.o lua.c
cc -o ossec-lua   lua.o liblua.a -lm  
cc -O2 -Wall -DLUA_COMPAT_ALL -DPREFIX=\"/var/ossec\" -DLUA_USE_POSIX    -c -o luac.o luac.c
cc -o ossec-luac   luac.o liblua.a -lm  
make[3]: se sale del directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3/src'
make[2]: se sale del directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3/src'
make[1]: se sale del directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3'
    CC os_maild/sendmail.o
    CC os_maild/sendcustomemail.o
    CC os_maild/config.o
    CC os_maild/os_maild_client.o
    CC os_maild/maild.o
    CC os_maild/mail_list.o
    CC os_crypto/blowfish/bf_op.o
    CC os_crypto/blowfish/bf_skey.o
    CC os_crypto/blowfish/bf_enc.o
    CC os_crypto/md5/md5.o
    CC os_crypto/md5/md5_op.o
    CC os_crypto/sha1/sha1_op.o
    CC os_zlib/os_zlib.o
    LINK os_zlib.a
    RANLIB os_zlib.a
    CC os_crypto/shared/keys.o
    CC os_crypto/shared/msgs.o
    CC os_crypto/md5_sha1/md5_sha1_op.o
    LINK os_crypto.a
    RANLIB os_crypto.a
    CC config/localfile-config.o
    CC config/rootcheck-config.o
    CC config/dbd-config.o
    CC config/active-response.o
    CC config/remote-config.o
    CC config/reports-config.o
    CC config/config.o
    CC config/syscheck-config.o
    CC config/global-config.o
    CC config/email-alerts-config.o
    CC config/rules-config.o
    CC config/agentlessd-config.o
    CC config/alerts-config.o
    CC config/csyslogd-config.o
    CC config/client-config.o
    LINK config.a
    RANLIB config.a
    CC shared/read-alert.o
    CC shared/fs_op.o
    CC shared/store_op.o
    CC shared/mem_op.o
    CC shared/regex_op.o
    CC shared/report_op.o
    CC shared/file_op.o
    CC shared/wait_op.o
    CC shared/help.o
    CC shared/list_op.o
    CC shared/mq_op.o
    CC shared/privsep_op.o
    CC shared/dirtree_op.o
    CC shared/custom_output_search_replace.o
    CC shared/file-queue.o
    CC shared/math_op.o
    CC shared/rules_op.o
    CC shared/string_op.o
    CC shared/read-agents.o
    CC shared/pthreads_op.o
    CC shared/hash_op.o
    CC shared/debug_op.o
    CC shared/validate_op.o
shared/validate_op.c: In function ‘__gethour’:
shared/validate_op.c:519:38: warning: ‘%02d’ directive output may be truncated writing between 2 and 11 bytes into a region of size 6 [-Wformat-truncation=]
             snprintf(ossec_hour, 6, "%02d:%02d", chour, cmin);
                                      ^~~~
shared/validate_op.c:519:37: note: directive argument in the range [-2147483636, 2147483647]
             snprintf(ossec_hour, 6, "%02d:%02d", chour, cmin);
                                     ^~~~~~~~~~~
In file included from /usr/include/stdio.h:862:0,
                 from ./headers/shared.h:54,
                 from shared/validate_op.c:10:
/usr/include/x86_64-linux-gnu/bits/stdio2.h:64:10: note: ‘__builtin___snprintf_chk’ output between 6 and 24 bytes into a destination of size 6
   return __builtin___snprintf_chk (__s, __n, __USE_FORTIFY_LEVEL - 1,
          ^~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        __bos (__s), __fmt, __va_arg_pack ());
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    CC shared/sig_op.o
    CC shared/randombytes.o
    CC shared/agent_op.o
    LINK shared.a
    RANLIB shared.a
    CC os_net/os_net.o
    LINK os_net.a
    RANLIB os_net.a
    CC os_regex/os_regex_match.o
    CC os_regex/os_regex.o
    CC os_regex/os_regex_str.o
    CC os_regex/os_match.o
    CC os_regex/os_regex_compile.o
    CC os_regex/os_regex_startswith.o
    CC os_regex/os_regex_free_pattern.o
    CC os_regex/os_match_compile.o
    CC os_regex/os_regex_strbreak.o
    CC os_regex/os_match_free_pattern.o
    CC os_regex/os_regex_maps.o
    CC os_regex/os_regex_execute.o
    CC os_regex/os_regex_free_substrings.o
    CC os_regex/os_match_execute.o
    LINK os_regex.a
    RANLIB os_regex.a
    CC os_xml/os_xml_variables.o
    CC os_xml/os_xml_writer.o
    CC os_xml/os_xml_access.o
    CC os_xml/os_xml.o
    CC os_xml/os_xml_node_access.o
    LINK os_xml.a
    RANLIB os_xml.a
    CC ossec-maild
    CC os_csyslogd/config.o
    CC os_csyslogd/main.o
    CC os_csyslogd/csyslogd.o
    CC os_csyslogd/alert.o
    CC ossec-csyslogd
    CC agentlessd/main.o
    CC agentlessd/agentlessd.o
    CC ossec-agentlessd
    CC os_execd/exec.o
    CC os_execd/config.o
    CC os_execd/execd.o
os_execd/execd.c: In function ‘ExecdStart’:
os_execd/execd.c:436:50: warning: ‘%d’ directive output may be truncated writing between 1 and 11 bytes into a region of size 9 [-Wformat-truncation=]
                             snprintf(ntimes, 9, "%d", ntimes_int);
                                                  ^~
os_execd/execd.c:436:49: note: directive argument in the range [-2147483647, 6]
                             snprintf(ntimes, 9, "%d", ntimes_int);
                                                 ^~~~
In file included from /usr/include/stdio.h:862:0,
                 from ./headers/shared.h:54,
                 from os_execd/execd.c:10:
/usr/include/x86_64-linux-gnu/bits/stdio2.h:64:10: note: ‘__builtin___snprintf_chk’ output between 2 and 12 bytes into a destination of size 9
   return __builtin___snprintf_chk (__s, __n, __USE_FORTIFY_LEVEL - 1,
          ^~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        __bos (__s), __fmt, __va_arg_pack ());
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
os_execd/execd.c:478:50: warning: ‘%d’ directive output may be truncated writing between 1 and 11 bytes into a region of size 9 [-Wformat-truncation=]
                             snprintf(ntimes, 9, "%d", ntimes_int);
                                                  ^~
os_execd/execd.c:478:49: note: directive argument in the range [-2147483647, 6]
                             snprintf(ntimes, 9, "%d", ntimes_int);
                                                 ^~~~
In file included from /usr/include/stdio.h:862:0,
                 from ./headers/shared.h:54,
                 from os_execd/execd.c:10:
/usr/include/x86_64-linux-gnu/bits/stdio2.h:64:10: note: ‘__builtin___snprintf_chk’ output between 2 and 12 bytes into a destination of size 9
   return __builtin___snprintf_chk (__s, __n, __USE_FORTIFY_LEVEL - 1,
          ^~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        __bos (__s), __fmt, __va_arg_pack ());
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    CC os_execd/win_execd.o
    CC ossec-execd
    CC logcollector/read_ossecalert.o
    CC logcollector/config.o
    CC logcollector/logcollector.o
    CC logcollector/read_djb_multilog.o
    CC logcollector/read_postgresql_log.o
    CC logcollector/read_mssql_log.o
    CC logcollector/read_win_el.o
    CC logcollector/read_win_event_channel.o
    CC logcollector/read_fullcommand.o
    CC logcollector/read_syslog.o
    CC logcollector/main.o
    CC logcollector/read_nmapg.o
    CC logcollector/read_command.o
    CC logcollector/read_mysql_log.o
    CC logcollector/read_multiline.o
    CC logcollector/read_snortfull.o
    CC ossec-logcollector
    CC remoted/manager.o
    CC remoted/sendmsg.o
    CC remoted/ar-forward.o
    CC remoted/config.o
    CC remoted/secure.o
    CC remoted/remoted.o
    CC remoted/main.o
    CC remoted/syslog.o
    CC remoted/syslogtcp.o
    CC ossec-remoted
    CC client-agent/sendmsg.o
    CC client-agent/config.o
    CC client-agent/intcheck_op.o
    CC client-agent/agentd.o
    CC client-agent/event-forward.o
    CC client-agent/receiver.o
    CC client-agent/main.o
    CC client-agent/receiver-win.o
    CC client-agent/start_agent.o
    CC client-agent/notify.o
    CC ossec-agentd
    CC addagent/read_from_user.o
    CC addagent/b64.o
    CC addagent/main.o
    CC addagent/validate.o
addagent/validate.c: In function ‘OS_AddNewAgent’:
addagent/validate.c:61:31: warning: ‘%d’ directive output may be truncated writing between 1 and 11 bytes into a region of size 8 [-Wformat-truncation=]
             snprintf(nid, 8, "%d", m);
                               ^~
addagent/validate.c:61:30: note: directive argument in the range [-1073741824, 1073741823]
             snprintf(nid, 8, "%d", m);
                              ^~~~
In file included from /usr/include/stdio.h:862:0,
                 from ./headers/shared.h:54,
                 from addagent/manage_agents.h:10,
                 from addagent/validate.c:11:
/usr/include/x86_64-linux-gnu/bits/stdio2.h:64:10: note: ‘__builtin___snprintf_chk’ output between 2 and 12 bytes into a destination of size 8
   return __builtin___snprintf_chk (__s, __n, __USE_FORTIFY_LEVEL - 1,
          ^~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        __bos (__s), __fmt, __va_arg_pack ());
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
addagent/validate.c:62:33: warning: ‘%d’ directive output may be truncated writing between 1 and 11 bytes into a region of size 8 [-Wformat-truncation=]
             snprintf(nid_p, 8, "%d", m - 1);
                                 ^~
addagent/validate.c:62:32: note: directive argument in the range [-1073741825, 1073741822]
             snprintf(nid_p, 8, "%d", m - 1);
                                ^~~~
In file included from /usr/include/stdio.h:862:0,
                 from ./headers/shared.h:54,
                 from addagent/manage_agents.h:10,
                 from addagent/validate.c:11:
/usr/include/x86_64-linux-gnu/bits/stdio2.h:64:10: note: ‘__builtin___snprintf_chk’ output between 2 and 12 bytes into a destination of size 8
   return __builtin___snprintf_chk (__s, __n, __USE_FORTIFY_LEVEL - 1,
          ^~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        __bos (__s), __fmt, __va_arg_pack ());
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    CC addagent/manage_keys.o
    CC addagent/manage_agents.o
    CC manage_agents
    CC util/syscheck_update.o
    CC syscheck_update
    CC util/clear_stats.o
    CC clear_stats
    CC util/list_agents.o
    CC list_agents
    CC util/agent_control.o
    CC agent_control
    CC util/syscheck_control.o
    CC syscheck_control
    CC util/rootcheck_control.o
    CC rootcheck_control
    CC util/verify-agent-conf.o
    CC verify-agent-conf
    CC util/ossec-regex.o
    CC ossec-regex
    CC syscheckd/create_db.o
    CC syscheckd/syscheck.o
    CC syscheckd/config.o
    CC syscheckd/seechanges.o
    CC syscheckd/run_check.o
    CC syscheckd/win-registry.o
    CC syscheckd/run_realtime.o
    CC rootcheck/common_rcl.o
    CC rootcheck/config.o
    CC rootcheck/check_rc_files.o
    CC rootcheck/check_rc_ports.o
    CC rootcheck/win-process.o
    CC rootcheck/unix-process.o
    CC rootcheck/common.o
    CC rootcheck/rootcheck.o
    CC rootcheck/check_rc_if.o
    CC rootcheck/check_open_ports.o
    CC rootcheck/os_string.o
    CC rootcheck/win-common.o
    CC rootcheck/check_rc_readproc.o
    CC rootcheck/check_rc_dev.o
    CC rootcheck/check_rc_sys.o
    CC rootcheck/run_rk_check.o
    CC rootcheck/check_rc_policy.o
    CC rootcheck/check_rc_pids.o
    CC rootcheck/check_rc_trojans.o
    LINK rootcheck.a
    RANLIB rootcheck.a
    CC ossec-syscheckd
    CC monitord/sendcustomemail.o
    CC monitord/sign_log.o
    CC monitord/manage_files.o
    CC monitord/monitord.o
    CC monitord/monitor_agents.o
    CC monitord/main.o
    CC monitord/generate_reports.o
    CC monitord/compress_log.o
    CC ossec-monitord
    CC reportd/report.o
    CC ossec-reportd
    CC os_auth/main-server.o
    CC os_auth/ssl.o
    CC os_auth/check_cert.o
    CC ossec-authd
./analysisd/compiled_rules/register_rule.sh build
*Build completed.
    CC analysisd/rules_list-live.o
    CC analysisd/lists-live.o
    CC analysisd/active-response-live.o
    CC analysisd/fts-live.o
    CC analysisd/lists_list-live.o
    CC analysisd/config-live.o
    CC analysisd/lists_make-live.o
    CC analysisd/cleanevent-live.o
    CC analysisd/rules-live.o
    CC analysisd/eventinfo-live.o
    CC analysisd/eventinfo_list-live.o
    CC analysisd/stats-live.o
    CC analysisd/accumulator-live.o
    CC analysisd/dodiff-live.o
    CC analysisd/analysisd-live.o
    CC analysisd/output/jsonout.o
    CC analysisd/output/prelude.o
    CC analysisd/output/zeromq.o
    CC analysisd/format/to_json.o
    CC analysisd/alerts/exec.o
    CC analysisd/alerts/log.o
    CC analysisd/alerts/getloglocation.o
    LINK alerts.a
    CC analysisd/cdb/cdb_hash.o
    CC analysisd/cdb/uint32_pack.o
    CC analysisd/cdb/uint32_unpack.o
    CC analysisd/cdb/cdb_make.o
    CC analysisd/cdb/cdb.o
    LINK cdb.a
    RANLIB cdb.a
    CC analysisd/decoders/plugin_decoders-live.o
    CC analysisd/decoders/decoder-live.o
    CC analysisd/decoders/hostinfo-live.o
    CC analysisd/decoders/decode-xml-live.o
    CC analysisd/decoders/syscheck-live.o
    CC analysisd/decoders/geoip-live.o
    CC analysisd/decoders/rootcheck-live.o
    CC analysisd/decoders/decoders_list-live.o
    CC analysisd/decoders/plugins/pf_decoder-live.o
    CC analysisd/decoders/plugins/sonicwall_decoder-live.o
    CC analysisd/decoders/plugins/symantecws_decoder-live.o
    CC analysisd/decoders/plugins/ossecalert_decoder-live.o
    CC analysisd/compiled_rules/generic_samples-live.o
    LINK decoders-live.a
    CC ossec-analysisd
    CC analysisd/rules_list-test.o
    CC analysisd/lists-test.o
    CC analysisd/active-response-test.o
    CC analysisd/fts-test.o
    CC analysisd/lists_list-test.o
    CC analysisd/config-test.o
    CC analysisd/lists_make-test.o
    CC analysisd/cleanevent-test.o
    CC analysisd/rules-test.o
    CC analysisd/eventinfo-test.o
    CC analysisd/eventinfo_list-test.o
    CC analysisd/stats-test.o
    CC analysisd/accumulator-test.o
    CC analysisd/dodiff-test.o
    CC analysisd/testrule-test.o
    CC analysisd/analysisd-test.o
    CC analysisd/decoders/plugin_decoders-test.o
    CC analysisd/decoders/decoder-test.o
    CC analysisd/decoders/hostinfo-test.o
    CC analysisd/decoders/decode-xml-test.o
    CC analysisd/decoders/syscheck-test.o
    CC analysisd/decoders/geoip-test.o
    CC analysisd/decoders/rootcheck-test.o
    CC analysisd/decoders/decoders_list-test.o
    CC analysisd/decoders/plugins/pf_decoder-test.o
    CC analysisd/decoders/plugins/sonicwall_decoder-test.o
    CC analysisd/decoders/plugins/symantecws_decoder-test.o
    CC analysisd/decoders/plugins/ossecalert_decoder-test.o
    CC analysisd/compiled_rules/generic_samples-test.o
    LINK decoders-test.a
    CC ossec-logtest
    CC analysisd/makelists-live.o
    CC ossec-makelists
    CC os_dbd/config.o
    CC os_dbd/db_op.o
    CC os_dbd/rules.o
    CC os_dbd/main.o
    CC os_dbd/server.o
    CC os_dbd/alert.o
    CC os_dbd/dbd.o
    CC ossec-dbd
make settings
make[1]: se entra en el directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src'

General settings:
    TARGET:           local
    V:                
    DEBUG:            
    DEBUGAD:          
    PREFIX:           /var/ossec
    MAXAGENTS:        2048
    REUSE_ID:         no
    DATABASE:         
    ONEWAY:           no
    CLEANFULL:        no
User settings:
    OSSEC_GROUP:      ossec
    OSSEC_USER:       ossec
    OSSEC_USER_MAIL:  ossecm
    OSSEC_USER_REM:   ossecr
ZLIB settings:
    ZLIB_SYSTEM:      no
    ZLIB_INCLUDE:     -I./external/zlib-1.2.11/
    ZLIB_LIB:         os_zlib.a external/zlib-1.2.11/libz.a
Lua settings:
    LUA_PLAT:         posix
    LUA_ENABLE:       yes
USE settings:
    USE_ZEROMQ:       no
    USE_GEOIP:        no
    USE_PRELUDE:      no
    USE_OPENSSL:      auto
    USE_INOTIFY:      no
    USE_SQLITE:       
Mysql settings:
    includes:         
    libs:             
Pgsql settings:
    includes:         
    libs:             
Defines:
    -DMAX_AGENTS=2048 -DOSSECHIDS -DDEFAULTDIR="/var/ossec" -DUSER="ossec" -DREMUSER="ossecr" -DGROUPGLOBAL="ossec" -DMAILUSER="ossecm" -DLinux -DINOTIFY_ENABLED -DLOCAL
Compiler:
    CFLAGS           -O2 -DMAX_AGENTS=2048 -DOSSECHIDS -DDEFAULTDIR="/var/ossec" -DUSER="ossec" -DREMUSER="ossecr" -DGROUPGLOBAL="ossec" -DMAILUSER="ossecm" -DLinux -DINOTIFY_ENABLED -DLOCAL -Wall -Wextra -I./ -I./headers/
    LDFLAGS          -lm -lpthread
    CC              cc
    MAKE            make
make[1]: se sale del directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src'

Done building local

cd external/lua-5.2.3/ && make posix
make[1]: se entra en el directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3'
cd src && make posix
make[2]: se entra en el directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3/src'
make all SYSCFLAGS="-DLUA_USE_POSIX"
make[3]: se entra en el directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3/src'
make[3]: No se hace nada para 'all'.
make[3]: se sale del directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3/src'
make[2]: se sale del directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3/src'
make[1]: se sale del directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src/external/lua-5.2.3'
make settings
make[1]: se entra en el directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src'

General settings:
    TARGET:           local
    V:                
    DEBUG:            
    DEBUGAD:          
    PREFIX:           /var/ossec
    MAXAGENTS:        2048
    REUSE_ID:         no
    DATABASE:         
    ONEWAY:           no
    CLEANFULL:        no
User settings:
    OSSEC_GROUP:      ossec
    OSSEC_USER:       ossec
    OSSEC_USER_MAIL:  ossecm
    OSSEC_USER_REM:   ossecr
ZLIB settings:
    ZLIB_SYSTEM:      no
    ZLIB_INCLUDE:     -I./external/zlib-1.2.11/
    ZLIB_LIB:         os_zlib.a external/zlib-1.2.11/libz.a
Lua settings:
    LUA_PLAT:         posix
    LUA_ENABLE:       yes
USE settings:
    USE_ZEROMQ:       no
    USE_GEOIP:        no
    USE_PRELUDE:      no
    USE_OPENSSL:      auto
    USE_INOTIFY:      no
    USE_SQLITE:       
Mysql settings:
    includes:         
    libs:             
Pgsql settings:
    includes:         
    libs:             
Defines:
    -DMAX_AGENTS=2048 -DOSSECHIDS -DDEFAULTDIR="/var/ossec" -DUSER="ossec" -DREMUSER="ossecr" -DGROUPGLOBAL="ossec" -DMAILUSER="ossecm" -DLinux -DINOTIFY_ENABLED -DLOCAL
Compiler:
    CFLAGS           -O2 -DMAX_AGENTS=2048 -DOSSECHIDS -DDEFAULTDIR="/var/ossec" -DUSER="ossec" -DREMUSER="ossecr" -DGROUPGLOBAL="ossec" -DMAILUSER="ossecm" -DLinux -DINOTIFY_ENABLED -DLOCAL -Wall -Wextra -I./ -I./headers/
    LDFLAGS          -lm -lpthread
    CC              cc
    MAKE            make
make[1]: se sale del directorio '/home/usuario/3.1.0/ossec-hids-3.1.0/src'

Done building local

./init/adduser.sh ossec ossecm ossecr ossec /var/ossec
Wait for success...
success
install -d -m 0550 -o root -g ossec /var/ossec/
install -d -m 0750 -o ossec -g ossec /var/ossec/logs
install -m 0660 -o ossec -g ossec /dev/null /var/ossec/logs/ossec.log
install -d -m 0550 -o root -g 0 /var/ossec/bin
install -m 0550 -o root -g 0 ossec-logcollector /var/ossec/bin
install -m 0550 -o root -g 0 ossec-syscheckd /var/ossec/bin
install -m 0550 -o root -g 0 ossec-execd /var/ossec/bin
install -m 0550 -o root -g 0 manage_agents /var/ossec/bin
install -m 0550 -o root -g 0 ../contrib/util.sh /var/ossec/bin/
install -m 0550 -o root -g 0 ./init/ossec-local.sh /var/ossec/bin/ossec-control
install -d -m 0550 -o root -g 0 /var/ossec/lua
install -d -m 0550 -o root -g 0 /var/ossec/lua/native
install -d -m 0550 -o root -g 0 /var/ossec/lua/compiled
install -m 0550 -o root -g 0 external/lua-5.2.3/src/ossec-lua /var/ossec/bin/
install -m 0550 -o root -g 0 external/lua-5.2.3/src/ossec-luac /var/ossec/bin/
install -d -m 0550 -o root -g ossec /var/ossec/queue
install -d -m 0770 -o ossec -g ossec /var/ossec/queue/alerts
install -d -m 0750 -o ossec -g ossec /var/ossec/queue/ossec
install -d -m 0750 -o ossec -g ossec /var/ossec/queue/syscheck
install -d -m 0750 -o ossec -g ossec /var/ossec/queue/diff
install -d -m 0550 -o root -g ossec /var/ossec/etc
install -m 0440 -o root -g ossec /etc/localtime /var/ossec/etc
install -d -m 1550 -o root -g ossec /var/ossec/tmp
install -m 0640 -o root -g ossec -b ../etc/internal_options.conf /var/ossec/etc/
install -m 0640 -o root -g ossec ../etc/local_internal_options.conf /var/ossec/etc/local_internal_options.conf
install -m 0640 -o root -g ossec /dev/null /var/ossec/etc/client.keys
install -m 0640 -o root -g ossec ../etc/ossec.mc /var/ossec/etc/ossec.conf
install -d -m 0770 -o root -g ossec /var/ossec/etc/shared
install -m 0640 -o ossec -g ossec rootcheck/db/*.txt /var/ossec/etc/shared/
install -d -m 0550 -o root -g ossec /var/ossec/active-response
install -d -m 0550 -o root -g ossec /var/ossec/active-response/bin
install -d -m 0550 -o root -g ossec /var/ossec/agentless
install -m 0550 -o root -g ossec agentlessd/scripts/* /var/ossec/agentless/
install -d -m 0700 -o root -g ossec /var/ossec/.ssh
install -m 0550 -o root -g ossec ../active-response/*.sh /var/ossec/active-response/bin/
install -m 0550 -o root -g ossec ../active-response/firewalls/*.sh /var/ossec/active-response/bin/
install -d -m 0550 -o root -g ossec /var/ossec/var
install -d -m 0770 -o root -g ossec /var/ossec/var/run
./init/fw-check.sh execute
install -m 0660 -o ossec -g ossec /dev/null /var/ossec/logs/active-responses.log
install -d -m 0750 -o ossec -g ossec /var/ossec/logs/archives
install -d -m 0750 -o ossec -g ossec /var/ossec/logs/alerts
install -d -m 0750 -o ossec -g ossec /var/ossec/logs/firewall
install -m 0550 -o root -g 0 ossec-agentlessd /var/ossec/bin
install -m 0550 -o root -g 0 ossec-analysisd /var/ossec/bin
install -m 0550 -o root -g 0 ossec-monitord /var/ossec/bin
install -m 0550 -o root -g 0 ossec-reportd /var/ossec/bin
install -m 0550 -o root -g 0 ossec-maild /var/ossec/bin
install -m 0550 -o root -g 0 ossec-remoted /var/ossec/bin
install -m 0550 -o root -g 0 ossec-logtest /var/ossec/bin
install -m 0550 -o root -g 0 ossec-csyslogd /var/ossec/bin
install -m 0550 -o root -g 0 ossec-authd /var/ossec/bin
install -m 0550 -o root -g 0 ossec-dbd /var/ossec/bin
install -m 0550 -o root -g 0 ossec-makelists /var/ossec/bin
install -m 0550 -o root -g 0 verify-agent-conf /var/ossec/bin/
install -m 0550 -o root -g 0 clear_stats /var/ossec/bin/
install -m 0550 -o root -g 0 list_agents /var/ossec/bin/
install -m 0550 -o root -g 0 ossec-regex /var/ossec/bin/
install -m 0550 -o root -g 0 syscheck_update /var/ossec/bin/
install -m 0550 -o root -g 0 agent_control /var/ossec/bin/
install -m 0550 -o root -g 0 syscheck_control /var/ossec/bin/
install -m 0550 -o root -g 0 rootcheck_control /var/ossec/bin/
install -d -m 0750 -o ossec -g ossec /var/ossec/stats
install -d -m 0550 -o root -g ossec /var/ossec/rules
install -m 0640 -o root -g ossec -b ../etc/rules/*.xml /var/ossec/rules
install -d -m 0750 -o ossec -g ossec /var/ossec/queue/fts
install -d -m 0750 -o ossec -g ossec /var/ossec/queue/rootcheck
install -d -m 0750 -o ossecr -g ossec /var/ossec/queue/agent-info
install -d -m 0750 -o ossec -g ossec /var/ossec/queue/agentless
install -d -m 0750 -o ossecr -g ossec /var/ossec/queue/rids
install -m 0640 -o root -g ossec ../etc/decoder.xml /var/ossec/etc/
rm -f /var/ossec/etc/shared/merged.mg


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

