<?php

namespace Arashinfo\Cpdk\ServerInfo;
/**
 * Description of ServerInfo
 *
 * @author gurjeet
 */
class ServerInfo {

    public function getHttpHost() {
        if (isset($_SERVER['HTTP_HOST'])) {
            return trim(strip_tags($_SERVER['HTTP_HOST']));
        }
        return FALSE;
    }

    public function getHttpConnection() {
        if (isset($_SERVER['HTTP_CONNECTION'])) {
            return trim(strip_tags($_SERVER['HTTP_CONNECTION']));
        }
        return FALSE;
    }

    public function getHttpUpgradeInsecureRequests() {
        if (isset($_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'])) {
            return trim(strip_tags($_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS']));
        }
        return FALSE;
    }

    public function getHttpUserAgent() {
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            return trim(strip_tags($_SERVER['HTTP_USER_AGENT']));
        }
        return FALSE;
    }

    public function getHttpAccept() {
        if (isset($_SERVER['HTTP_ACCEPT'])) {
            return trim(strip_tags($_SERVER['HTTP_ACCEPT']));
        }
        return FALSE;
    }

    public function getHttpReferer() {
        if (isset($_SERVER['HTTP_REFERER'])) {
            return trim(strip_tags($_SERVER['HTTP_REFERER']));
        }
        return FALSE;
    }

    public function getHttpAcceptEncoding() {
        if (isset($_SERVER['HTTP_ACCEPT_ENCODING'])) {
            return trim(strip_tags($_SERVER['HTTP_ACCEPT_ENCODING']));
        }
        return FALSE;
    }

    public function getHttpAcceptLanguage() {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            return trim(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']));
        }
        return FALSE;
    }

    public function getPath() {
        if (isset($_SERVER['PATH'])) {
            return trim(strip_tags($_SERVER['PATH']));
        }
        return FALSE;
    }

    public function getServerSignature() {
        if (isset($_SERVER['SERVER_SIGNATURE'])) {
            return trim(strip_tags($_SERVER['SERVER_SIGNATURE']));
        }
        return FALSE;
    }

    public function getServerSoftware() {
        if (isset($_SERVER['SERVER_SOFTWARE'])) {
            return trim(strip_tags($_SERVER['SERVER_SOFTWARE']));
        }
        return FALSE;
    }

    public function getServerName() {
        if (isset($_SERVER['SERVER_NAME'])) {
            return trim(strip_tags($_SERVER['SERVER_NAME']));
        }
        return FALSE;
    }

    public function getServerAddr() {
        if (isset($_SERVER['SERVER_ADDR'])) {
            return trim(strip_tags($_SERVER['SERVER_ADDR']));
        }
        return FALSE;
    }

    public function getServerPort() {
        if (isset($_SERVER['SERVER_PORT'])) {
            return trim(strip_tags($_SERVER['SERVER_PORT']));
        }
        return FALSE;
    }

    public function getRemoteAddr() {
        if (isset($_SERVER['REMOTE_ADDR'])) {
            return trim(strip_tags($_SERVER['REMOTE_ADDR']));
        }
        return FALSE;
    }

    public function getDocumentRoot() {
        if (isset($_SERVER['DOCUMENT_ROOT'])) {
            return trim(strip_tags($_SERVER['DOCUMENT_ROOT']));
        }
        return FALSE;
    }

    public function getRequestScheme() {
        if (isset($_SERVER['REQUEST_SCHEME'])) {
            return trim(strip_tags($_SERVER['REQUEST_SCHEME']));
        }
        return FALSE;
    }

    public function getContextPrefix() {
        if (isset($_SERVER['CONTEXT_PREFIX'])) {
            return trim(strip_tags($_SERVER['CONTEXT_PREFIX']));
        }
        return FALSE;
    }

    public function getContextDocumentRoot() {
        if (isset($_SERVER['CONTEXT_DOCUMENT_ROOT'])) {
            return trim(strip_tags($_SERVER['CONTEXT_DOCUMENT_ROOT']));
        }
        return FALSE;
    }

    public function getServerAdmin() {
        if (isset($_SERVER['SERVER_ADMIN'])) {
            return trim(strip_tags($_SERVER['SERVER_ADMIN']));
        }
        return FALSE;
    }

    public function getScriptFilename() {
        if (isset($_SERVER['SCRIPT_FILENAME'])) {
            return trim(strip_tags($_SERVER['SCRIPT_FILENAME']));
        }
        return FALSE;
    }

    public function getRemotePort() {
        if (isset($_SERVER['REMOTE_PORT'])) {
            return trim(strip_tags($_SERVER['REMOTE_PORT']));
        }
        return FALSE;
    }

    public function getGatewayInterface() {
        if (isset($_SERVER['GATEWAY_INTERFACE'])) {
            return trim(strip_tags($_SERVER['GATEWAY_INTERFACE']));
        }
        return FALSE;
    }

    public function getServerProtocol() {
        if (isset($_SERVER['SERVER_PROTOCOL'])) {
            return trim(strip_tags($_SERVER['SERVER_PROTOCOL']));
        }
        return FALSE;
    }

    public function getRequestMethod() {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            return trim(strip_tags($_SERVER['REQUEST_METHOD']));
        }
        return FALSE;
    }

    public function getQueryString() {
        if (isset($_SERVER['QUERY_STRING'])) {
            return trim(strip_tags($_SERVER['QUERY_STRING']));
        }
        return FALSE;
    }

    public function getRequestUri() {
        if (isset($_SERVER['REQUEST_URI'])) {
            return trim(strip_tags($_SERVER['REQUEST_URI']));
        }
        return FALSE;
    }

    public function getScriptName() {
        if (isset($_SERVER['SCRIPT_NAME'])) {
            return trim(strip_tags($_SERVER['SCRIPT_NAME']));
        }
        return FALSE;
    }

    public function getPhpSelf() {
        if (isset($_SERVER['PHP_SELF'])) {
            return trim(strip_tags($_SERVER['PHP_SELF']));
        }
        return FALSE;
    }

    public function getRequestTimeFloat() {
        if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
            return trim(strip_tags($_SERVER['REQUEST_TIME_FLOAT']));
        }
        return FALSE;
    }

    public function getRequestTime() {
        if (isset($_SERVER['REQUEST_TIME'])) {
            return trim(strip_tags($_SERVER['REQUEST_TIME']));
        }
        return FALSE;
    }

}
