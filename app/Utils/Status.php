<?php

namespace App\Utils;

class Status
{
    /** const SUCCESS constante responsável pela resposta de Sucesso nas requisições */
    const SUCCESS = '00';

    /** const ERROR constante responsável pela resposta de erro nas requisições */
    const ERROR = '01';

    /** const ERROR_VALIDATION constante responsável pela resposta de Erro nas Validações das requisições */
    const ERROR_VALIDATION = '02';

    /** const API_SUCCESS constante responsável pela resposta de Sucesso nas requisições */
    const API_SUCCESS = '200';

    /** const API_ACCEPT constante responsável pela resposta de Aceito nas requisições */
    const API_ACCEPT = '202';

    /** const ERROR_VALIDATION constante responsável pela resposta de Erro nas Validações das requisições */
    const API_ERROR_VALIDATION = '400';

    /** const UNAUTHORIZED constante responsável pela resposta de Inautorizado nas requisições */
    const UNAUTHORIZED = '401';

    /** const API_FORBIDDEN constante responsável pela resposta de Sem Permissão nas requisições */
    const API_FORBIDDEN = '403';

    /** const NOT_FOUND constante responsável pela resposta de Inexistente nas requisições */
    const NOT_FOUND = '404';

    /** const INTERNAL_ERROR constante responsável pela resposta de Erro Interno das requisições */
    const INTERNAL_ERROR = '500';
}
