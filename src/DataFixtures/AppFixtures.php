<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Category;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        // $product = new Product();
        // $manager->persist($product);

        // Create categories
        $categoriesData = [
            '🚀 Science-fiction',
            '🧙‍♂️ Fantaisie',
            '🔍 Mystère',
            '📚 Non-fiction',
            '❤️ Romance'
        ];

        $categories = [];
        foreach ($categoriesData as $categoryName) {
            $category = new Category();
            $category->setCategoryName($categoryName);
            $manager->persist($category);
            $categories[] = $category;
        }

        $authorsData = [
            ['name' => 'Isaac Asimov', 'biography' => 'Isaac Asimov était un écrivain américain et professeur de biochimie.'],
            ['name' => 'J.K. Rowling', 'biography' => 'J.K. Rowling est une auteure britannique, surtout connue pour la série Harry Potter.'],
            ['name' => 'Agatha Christie', 'biography' => 'Agatha Christie était une écrivaine anglaise connue pour ses 66 romans policiers.'],
            ['name' => 'Stephen Hawking', 'biography' => 'Stephen Hawking était un physicien théoricien, cosmologiste et auteur anglais.'],
            ['name' => 'Jane Austen', 'biography' => 'Jane Austen était une romancière anglaise connue principalement pour ses six grands romans.'],
            ['name' => 'George Orwell', 'biography' => 'George Orwell était un romancier, essayiste, journaliste et critique anglais.'],
            ['name' => 'J.R.R. Tolkien', 'biography' => 'J.R.R. Tolkien était un écrivain, poète, philologue et universitaire anglais.'],
            ['name' => 'Mary Shelley', 'biography' => 'Mary Shelley était une romancière anglaise, auteure du roman gothique Frankenstein.'],
            ['name' => 'Mark Twain', 'biography' => 'Mark Twain était un écrivain, humoriste, entrepreneur, éditeur et conférencier américain.'],
            ['name' => 'Léon Tolstoï', 'biography' => 'Léon Tolstoï était un écrivain russe, considéré comme l\'un des plus grands auteurs de tous les temps.'],
        ];

        $authors = [];
        foreach ($authorsData as $authorData) {
            $author = new Author();
            $author->setAuthorName($authorData['name']);
            $author->setBiography($authorData['biography']);
            $manager->persist($author);
            $authors[] = $author;
        }

        $booksData = [
            ['title' => 'Fondation', 'author' => 'Isaac Asimov', 'categories' => ['🚀Science-fiction']],
            ['title' => 'Harry Potter à l\'école des sorciers', 'author' => 'J.K. Rowling', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Le Crime de l\'Orient-Express', 'author' => 'Agatha Christie', 'categories' => ['🔍 Mystère']],
            ['title' => 'Une brève histoire du temps', 'author' => 'Stephen Hawking', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Orgueil et Préjugés', 'author' => 'Jane Austen', 'categories' => ['❤️ Romance']],
            ['title' => '1984', 'author' => 'George Orwell', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'Le Hobbit', 'author' => 'J.R.R. Tolkien', 'categories' => ['🧙‍♂️Fantaisie']],
            ['title' => 'Frankenstein', 'author' => 'Mary Shelley', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'Les Aventures de Tom Sawyer', 'author' => 'Mark Twain', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Guerre et Paix', 'author' => 'Léon Tolstoï', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Les Robots', 'author' => 'Isaac Asimov', 'categories' => [' 🚀Science-fiction']],
            ['title' => 'Harry Potter et la Chambre des Secrets', 'author' => 'J.K. Rowling', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Mort sur le Nil', 'author' => 'Agatha Christie', 'categories' => ['Mystère']],
            ['title' => 'Le Grand Dessein', 'author' => 'Stephen Hawking', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Emma', 'author' => 'Jane Austen', 'categories' => ['❤️ Romance']],
            ['title' => 'La Ferme des animaux', 'author' => 'George Orwell', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'Le Seigneur des Anneaux', 'author' => 'J.R.R. Tolkien', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Mathilda', 'author' => 'Mary Shelley', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'Les Aventures de Huckleberry Finn', 'author' => 'Mark Twain', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Anna Karénine', 'author' => 'Léon Tolstoï', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Le Cycle de Fondation', 'author' => 'Isaac Asimov', 'categories' => ['Science-fiction']],
            ['title' => 'Harry Potter et le Prisonnier d\'Azkaban', 'author' => 'J.K. Rowling', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Les Dix Petits Nègres', 'author' => 'Agatha Christie', 'categories' => ['Mystère']],
            ['title' => 'L\'Univers en une coquille de noix', 'author' => 'Stephen Hawking', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Raison et Sentiments', 'author' => 'Jane Austen', 'categories' => ['❤️ Romance']],
            ['title' => 'La Descente des temps', 'author' => 'George Orwell', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'Le Silmarillion', 'author' => 'J.R.R. Tolkien', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Le Dernier Homme', 'author' => 'Mary Shelley', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'Le Prince et le Pauvre', 'author' => 'Mark Twain', 'categories' => ['🧙‍♂️Fantaisie']],
            ['title' => 'Résurrection', 'author' => 'Léon Tolstoï', 'categories' => ['📚 Non-fiction']],
            ['title' => 'La Fin de l\'Éternité', 'author' => 'Isaac Asimov', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'Harry Potter et la Coupe de Feu', 'author' => 'J.K. Rowling', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Le Meurtre de Roger Ackroyd', 'author' => 'Agatha Christie', 'categories' => ['🔍 Mystère']],
            ['title' => 'Dieu, un paléontologue?', 'author' => 'Stephen Hawking', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Northanger Abbey', 'author' => 'Jane Austen', 'categories' => ['❤️ Romance']],
            ['title' => 'Sans un sou', 'author' => 'George Orwell', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'Contes et légendes inachevés', 'author' => 'J.R.R. Tolkien', 'categories' => ['🧙‍♂️Fantaisie']],
            ['title' => 'Lodore', 'author' => 'Mary Shelley', 'categories' => ['🚀Science-fiction']],
            ['title' => 'Le Voyageur du Temps', 'author' => 'Mark Twain', 'categories' => ['Fantaisie']],
            ['title' => 'Enfance', 'author' => 'Léon Tolstoï', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Les Courants de l\'espace', 'author' => 'Isaac Asimov', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'Harry Potter et l\'Ordre du Phénix', 'author' => 'J.K. Rowling', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Cartes sur Table', 'author' => 'Agatha Christie', 'categories' => ['🔍 Mystère']],
            ['title' => 'Le Grand Conflit', 'author' => 'Stephen Hawking', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Persuasion', 'author' => 'Jane Austen', 'categories' => ['❤️ Romance']],
            ['title' => 'L\'homme qui aimait trop les livres', 'author' => 'George Orwell', 'categories' => ['🚀Science-fiction']],
            ['title' => 'Les Enfants de Húrin', 'author' => 'J.R.R. Tolkien', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Falkner', 'author' => 'Mary Shelley', 'categories' => ['🚀 Science-fiction']],
            ['title' => 'L\'Étranger au royaume des tempêtes', 'author' => 'Mark Twain', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Adolescence', 'author' => 'Léon Tolstoï', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Les Dieux eux-mêmes', 'author' => 'Isaac Asimov', 'categories' => ['🚀Science-fiction']],
            ['title' => 'Harry Potter et le Prince de Sang-Mêlé', 'author' => 'J.K. Rowling', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'La Maison du Péril', 'author' => 'Agatha Christie', 'categories' => ['🔍 Mystère']],
            ['title' => 'Les trous noirs', 'author' => 'Stephen Hawking', 'categories' => ['📚 Non-fiction']],
            ['title' => 'Lady Susan', 'author' => 'Jane Austen', 'categories' => ['❤️ Romance']],
            ['title' => 'Le Lion et la Licorne', 'author' => 'George Orwell', 'categories' => ['🚀Science-fiction']],
            ['title' => 'Roverandom', 'author' => 'J.R.R. Tolkien', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Proserpine', 'author' => 'Mary Shelley', 'categories' => ['Science-fiction']],
            ['title' => 'Un Yankee à la cour du roi Arthur', 'author' => 'Mark Twain', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'Jeunesse', 'author' => 'Léon Tolstoï', 'categories' => ['📚 Non-fiction']],
            ['title' => 'La Pierre des Etoiles', 'author' => 'Isaac Asimov', 'categories' => ['🚀Science-fiction']],
            ['title' => 'Harry Potter et les Reliques de la Mort', 'author' => 'J.K. Rowling', 'categories' => ['🧙‍♂️ Fantaisie']],
            ['title' => 'La Dernière Énigme', 'author' => 'Agatha Christie', 'categories' => ['🔍 Mystère']],
        ];

        foreach ($booksData as $bookData) {
            $book = new Book();
            $book->setTitle($bookData['title']);
            foreach ($authors as $author) {
                if ($author->getAuthorName() === $bookData['author']) {
                    $book->setAuthor($author);
                    break;
                }
            }
            foreach ($bookData['categories'] as $categoryName) {
                foreach ($categories as $category) {
                    if ($category->getCategoryName() === $categoryName) {
                        $book->addCategory($category);
                    }
                }
            }
            $manager->persist($book);
        }

        $manager->flush();
    }
}
