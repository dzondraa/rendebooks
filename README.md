# Rendebooks

### Solution for Bookstore containing backend platform and REST API.

### Authentication
- CSRF token and App key

### Authorization
- Token authorization is supported. This means that after successful login, the authorization token is obtained. Every subsequent API call should have this token inside the "Authorization" header field like so:

```
Authorization: Bearer 12345
```
