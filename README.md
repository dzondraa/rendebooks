# Rendebooks

### Solution for Bookstore containing backend platform and REST API.

### Authentication
- CSRF token and App key

### Authorization
- Token authorization is supported. This means that after successful login, the authorization token is obtained. Every subsequent API call should have this token inside the "Authorization" header field like so:

```
Authorization: UUFqdE9xOEVYSmptUWdGb3FLMnVSQ1JhMnhyZkVmVjAwRWt4R0tWOWpKbmFRNjZQYWd4aFlrMWQ2bTJJ5e827d22aaa0d
```
