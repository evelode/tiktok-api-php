# 2.0.0

- Complete named access to 54 TikTok routes, plus `call()` and the existing fluent builder.
- Preserve positional signatures of existing methods; new methods accept query arrays.
- Fix accidental POST requests, URL query decoding, disabled TLS verification, credential debug output and undefined fallback errors.
- Authenticate custom builder requests automatically; reject absolute endpoint URLs and disable redirects.
- Add timeout/base URL configuration and injectable Guzzle client.
- Correct response status mapping and extend envelope/payload models.
- Use environment keys and correct autoloader paths in examples.
- Require PHP 8.1+ and only the extensions used by the HTTP client/model mapper. This raises the supported PHP minimum; use the prior release for legacy PHP runtimes.
