# Jump.BG API Documentation and examples
In the following documentation, im going to explain how to connect to Jump.BG's **API** server and how to execute different functions and types.

# URL
[https://api.jump.bg/api.php](https://api.jump.bg/api.php)

## Authentication

In order to authenticate, you must already have a reseller account with Jump.BG. If you  dont have one and you want to become our reseller, contact us at office@jump.bg
After this is done, you have to send the following **POST** parameters to our URL:

- **api_userid** - Your Reseller ID
- **api_password** - Your Reseller password

## Way of work
Along with the authentication, you have to send **type, action and additional parameters (if such)** as POST parameters. The returned result will be in JSON format.

## Types and actions

- domain
- - request 

**Valid only for .BG domains**. Before registering a .BG domain, you must have a valid and processed request. Additional parameters:

-- **domain** (name of the .bg domain)

-- **registrant** (id of the contact details for the request. Must be predefined with the reseller registration)

-- **transfer**  (true / false if its a transfer request from another registrar)

-  - register

Registration request, if the registration completes, it will create an order with your jump.bg account along with invoice and it will use your account balance to pay the invoice. The registration should complete automatically unless something goes wrong. Additional parameters:

-- **domain** (name of the domain)

-- **reg_period** (Period for the domain to be register in years)

- - transfer

Transfer request, if the transfer completes  it will create an order with your jump.bg account along with invoice and it will use your account balance to pay the invoice. The transfer should complete automatically unless something goes wrong. Additional parameters:

-- **domain** (name of the domain)

-- **epp** (Epp code or transfer key if the domain supports such)

-  - renew

Renewing the domain. Can be renewed at any point. It will throw an error if the domain is already being invoiced in your Jump.BG profile. You have to pay the already generated invoice. If the domain is invoiced with other domains / services, **contact us** and we will split the invoice. Additional parameters:

-- **domainid** (Id of the domain. Can be obtained thru the list action)

-- **renew_period** (Period for the domain to be renewed in years)

- - setns

Set nameservers to already active domain. Additional parameters:

-- **domainid** (Id of the domain. Can be obtained thru the list action)

-- **ns1** (Nameserver #1, **REQUIRED**)

-- **ns2** (Nameserver #2, **REQUIRED**)

-- **ns3** (Nameserver #3)

-- **ns4** (Nameserver #4)

-- **ns5** (Nameserver #5)

- - getns

Get nameservers to already active domain. Additional parameters:

-- **domainid** (Id of the domain. Can be obtained thru the list action)


- - list

Lists all active domains. No additional parameters.

-- **fromdate** (From which date to display results - YYYY-MM-DD, **REQUIRED**)

-- **todate** (To which date to display results - YYYY-MM-DD, **REQUIRED**)

-- **limit** (How many entries to display, **REQUIRED**)


- service

**Still in development, check again later**
- addon

**Still in development, check again later**
- balance

Shows the current account balance.

## PHP Example

```php
$curl_url = 'https://api.jump.bg/api.php';

$curl_post = [
	'api_userid' => 'username',
	'api_password' => 'password',
	'type' => 'domain',
	'action' => 'register',
	'domain' => 'example.com',
	'reg_period' => 1,
];

$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => $curl_url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $curl_post,
]);

$response = curl_exec($curl);
curl_close($curl);

var_dump($response); //It will return the result in JSON
```

