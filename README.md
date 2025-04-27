[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

<!-- PROJECT LOGO -->
<br />
<samp>
<p align="center">
  <a href="#">
    <img src="./logo.svg" alt="Logo" width="35">
  </a>

  <h3 align="center" id="fuj">Aspire</h3>

  <p align="center">
    <a href="https://aspireteste.000webhostapp.com/">Demo</a>
    &#124;	
    <a href="https://github.com/SilasRodrigues19/Aspire/issues">Report Bug</a>
  </p>

  <p align="center">
    An app to people publish and find opportunities.
  </p>
</p>

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

<hr>

### Auth pages

| Sign Up | Sign In |
| -------- | -------- |
| [![Preview][product-screenshot6]](https://aspireteste.000webhostapp.com/) | [![Preview][product-screenshot5]](https://aspireteste.000webhostapp.com/) |

| Forgot Password - Send Token | Forgot Password  |
| -------- | -------- |
| [![Preview][product-screenshot7]](https://aspireteste.000webhostapp.com/) | [![Preview][product-screenshot8]](https://aspireteste.000webhostapp.com/) |

<hr>

### Core pages

| Home | Archived posts |
| -------- | -------- |
| [![Preview][product-screenshot]](https://aspireteste.000webhostapp.com/) | [![Preview][product-screenshot3]](https://aspireteste.000webhostapp.com/) |
| Publish opportunity | About project |
| [![Preview][product-screenshot2]](https://aspireteste.000webhostapp.com/) | [![Preview][product-screenshot4]](https://aspireteste.000webhostapp.com/) |
| Report page | View reported jobs |
| [![Preview][product-screenshot9]](https://aspireteste.000webhostapp.com/) | [![Preview][product-screenshot10]](https://aspireteste.000webhostapp.com/) |


The screens and features are described below:

- **/job/signup:** user sign up page

- **/job/singin:** user sing in page. There are some routes that you need to authenticate to access, and in the future some pages will be accessed based on the level of the auth user

- **/job/forgot-password:** page to request a password reset, enter an email and if this email is in the database, a token will be sent to change the password.

- **/job/forgot-password?token=XXX&email=YYY:** this page is accessed via the link sent by email when requesting a password reset, the token and email are concatenated in the URL.

- **/job:** has a table listing all opportunities published by other people, with the necessary information. In the top navigation has a input field to search anything more easily.

- **/new:** route that leads to publish page, just fill in all the field and publish. (you must be authenticated to view this page).

- **/archived:** opportunities that have timed out will be moved in the list that will appear on this page. (you must be authenticated to view this page).

- **/about:** a simple page to talk about this project.

- **/report:** page to report publications that are not in the context of job opportunities.

## Built With

Technologies used in the project.

### Tools

- [SASS](https://sass-lang.com/)

### Frameworks

- [CodeIgniter](https://codeigniter.com/)
- [Bulma](https://bulma.io/)

### Libraries / Plugins

- [jQuery](https://jquery.com/)
- [Iconify Design](https://iconify.design/)

### Database

- [MySQL](https://www.mysql.com/)


<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- LICENSE -->

## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->

## Contact

Silas Rodrigues - [@jinuye1](https://twitter.com/jinuye1) - silasrodrigues.fatec@gmail.com

Project Link: [https://github.com/SilasRodrigues19/Aspire](https://github.com/SilasRodrigues19/Aspire) <br>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/SilasRodrigues19/aspire.svg?style=for-the-badge
[contributors-url]: https://github.com/SilasRodrigues19/Aspire/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/SilasRodrigues19/aspire.svg?style=for-the-badge
[forks-url]: https://github.com/SilasRodrigues19/Aspire/network/members
[stars-shield]: https://img.shields.io/github/stars/SilasRodrigues19/aspire.svg?style=for-the-badge
[stars-url]: https://github.com/SilasRodrigues19/Aspire/stargazers
[issues-shield]: https://img.shields.io/github/issues/SilasRodrigues19/aspire.svg?style=for-the-badge
[issues-url]: https://github.com/SilasRodrigues19/Aspire/issues
[license-shield]: https://img.shields.io/github/license/SilasRodrigues19/aspire.svg?style=for-the-badge
[license-url]: https://github.com/SilasRodrigues19/Aspire/blob/master/LICENSE
[product-screenshot]: ./public/screenshots/preview.png
[product-screenshot2]: ./public/screenshots/preview2.png
[product-screenshot3]: ./public/screenshots/preview3.png
[product-screenshot4]: ./public/screenshots/preview4.png
[product-screenshot5]: ./public/screenshots/preview5.png
[product-screenshot6]: ./public/screenshots/preview6.png
[product-screenshot7]: ./public/screenshots/preview7.png
[product-screenshot8]: ./public/screenshots/preview8.png
[product-screenshot9]: ./public/screenshots/preview9.png
[product-screenshot10]: ./public/screenshots/preview10.png
[license-url]: https://github.com/SilasRodrigues19/Aspire/blob/master/LICENSE

<br><hr>
[🔼 Back to top](#fuj)
