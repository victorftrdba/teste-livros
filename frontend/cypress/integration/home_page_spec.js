describe('Página Principal', () => {
    it('carregar com sucesso', () => {
        cy.visit('http://localhost:3000');
    });
});

describe('Login como administrador', () => {
    it('logar com sucesso como administrador', function () {
        cy.visit('http://localhost:3000/admin-login');

        cy.request('POST', 'http://localhost:8000/api/admin-login', {
            email: 'admin@teste.com',
            password: 'teste'
        }).then((response) => {
            expect(response.body).to.have.property('plainTextToken');

            localStorage.setItem('admin-token', response.body.plainTextToken);

            cy.visit('http://localhost:3000/admin/readers');
        });
    });
});

describe('Login como leitor', () => {
    it('logar com sucesso como leitor', function () {
        cy.wait(3000);
        cy.visit('http://localhost:3000/');
        cy.wait(3000);
        cy.visit('http://localhost:3000/reader-login');

        cy.request('POST', 'http://localhost:8000/api/reader-login', {
            email: 'cypress@cypress.com.br',
            password: 'teste'
        }).then((response) => {
            expect(response.body).to.have.property('plainTextToken');

            localStorage.setItem('reader-token', response.body.plainTextToken);

            cy.visit('http://localhost:3000/reader/books');
        });
    });
});

describe('Cadastrar novo leitor', () => {
    it('cadastrar novo leitor com sucesso', function () {
        cy.wait(3000);
        cy.visit('http://localhost:3000/admin-login');

        cy.request('POST', 'http://localhost:8000/api/admin-login', {
            email: 'admin@teste.com',
            password: 'teste'
        }).then((response) => {
            expect(response.body).to.have.property('plainTextToken');

            localStorage.setItem('admin-token', response.body.plainTextToken);

            let randomString = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

            let chars = 'abcdefghijklmnopqrstuvwxyz1234567890';
            let string = '';

            for(let i = 0; i < 15; i++){
                string += chars[Math.floor(Math.random() * chars.length)];
            }

            cy.request({
                method: 'POST',
                url: 'http://localhost:8000/api/readers',
                body: {
                    name: randomString,
                    email: string + '@gmail.com',
                    address: 'Rua Cypress, 512',
                    phone: '(00) 00000-0000',
                    birthday: '1999-10-01',
                    password: 'teste',
                },
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('admin-token')}`
                }
            }).then((response) => {
                expect(response.body).to.have.property('success');
            });

            cy.wait(3000);

            cy.visit('http://localhost:3000/admin/readers');
        });
    });
});

describe('Cadastrar novo livro', () => {
    it('cadastrar novo livro com sucesso', function () {
        cy.wait(3000);
        cy.visit('http://localhost:3000/admin-login');

        cy.request('POST', 'http://localhost:8000/api/admin-login', {
            email: 'admin@teste.com',
            password: 'teste'
        }).then((response) => {
            expect(response.body).to.have.property('plainTextToken');

            localStorage.setItem('admin-token', response.body.plainTextToken);

            let randomString = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

            cy.request({
                method: 'POST',
                url: 'http://localhost:8000/api/books',
                body: {
                    name: "Livro " + randomString,
                    gender: 'Ficção Teste',
                    author: 'Victor',
                    pages: '512',
                    year: '1999',
                    language: 'Inglês',
                    edition: "1",
                    editor: {
                        name: randomString,
                        code: '5123321',
                        phone: '(00) 00000-0000'
                    },
                    isbn: "123-23-232-321-23"
                },
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('admin-token')}`
                }
            }).then((response) => {
                expect(response.body).to.have.property('success');
            });

            cy.wait(3000);

            cy.visit('http://localhost:3000/admin/books');
        });
    });
});