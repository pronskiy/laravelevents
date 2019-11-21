<?php /** @noinspection GrazieInspection */




            1_000_000_000;   // Is this 10M or a billion?

            6.674_083e-11; // float
            299_792_458;    // decimal
            0xCAFE_F00D;   // hexadecimal
            0b0101_1111;   // binary
            013_7041;      // octal








    class User {};




            interface Factory {
                public function make(): object;
            }

            class UserFactory implements Factory {
                // It is allowed to narrow down the type here
                public function make(): User
                {
                    return new User;
                }
            }

            interface Concatenable {
                public function concat(Iterator $input);
            }

            class Collection implements Concatenable {
                // And here you can widen the type
                public function concat(iterable $input)
                {
                }
            }





    class SerializeMe implements Serializable
    {
        public function __serialize()
        {

        }

        public function __unserialize()
        {

        }

        /**
         * @inheritDoc
         */
        public function serialize()
        {
            // TODO: Implement serialize() method.
        }

        /**
         * @inheritDoc
         */
        public function unserialize($serialized)
        {
            // TODO: Implement unserialize() method.
        }
    }

    serialize(new SerializeMe());





            (1 ? 2 : 3) ? 4 : 5; // ok
            1 ? 2 : (3 ? 4 : 5); // ok

            (1 ? 2 : 3) ? 4 : 5;   // deprecated








            // PHP 7.4 Deprecations

            get_magic_quotes_gpc();
            get_magic_quotes_runtime();
            hebrevc('');
            convert_cyr_string('', '', '');
            money_format('', 0);
            ezmlm_hash('');
            restore_include_path();

            $float = (float)'2019.3';

            implode('-', [1, 2, 3]);
            implode([1, 2, 3], '-');

            $arr = [1, 2, 3];
            echo $arr[1];





    $lambda = fn () => 'PHP 7.4';




        $posts = [

        ];
        $prefix = '2019_';

        $ids = array_map(fn($post) => $prefix . $post->id, $posts);










    $outerScopeVariable = 1;
    $fn = fn($x) => $x + $ou;
