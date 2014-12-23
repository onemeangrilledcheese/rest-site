'use strict';
module.exports = function(grunt) {
    // display the elapsed execution time of grunt tasks
    require('time-grunt')(grunt);
    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            options: {
                livereload: true,
            },
            sass: {
                files: ['sass/**/*.{scss,sass}'],
                tasks: ['sass', 'autoprefixer', 'browserSync'],
            },
            css: {
                files: ['style.css'],
                tasks: ['autoprefixer'],
            },
            scripts: {
                files: ['sass/**/*.{scss,sass}', 'style.css', 'js/*.js', '**/*.php'],
                tasks: ['jshint', 'browserSync'],
            }

        },

        // sass
        sass: {
            dist: {
                options: {
                    outputStyle: 'compress',
                    lineNumbers: true,
                    includePaths: require('node-neat').includePaths
                },
                files: {
                    'style.css': 'sass/style.scss'
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 4 versions']
            },
            dist: {
                files: {
                    'style.css': 'style.css'
                }
            }
        },
        // runs across multiple devices (runs concurrently with watch task)
        browserSync: {
            dev: {
                bsFiles: {
                    src : ['style.css', '*.php', 'js/*.js']
                },
                options: {
                    proxy: "rest-site.dev",
                    watchTask : true // < VERY important
                }
            }
        },
        // jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true,
                reporter: require('jshint-stylish')
            },
            all: [
                'Gruntfile.js',
                'js/*.js'
            ]
        },
        // uglify
        uglify: {
            main: {
                options: {
                    sourceMap: 'js/scripts.js.map',
                    sourceMappingURL: 'scripts.js.map',
                    sourceMapPrefix: 2
                },
                files: {
                    'js/scripts.min.js': [
                        'js/scripts.js'
                    ]
                }
            }
        },
        // concurrent
        concurrent: {
            target: {
                tasks: ['autoprefixer', 'sass', 'uglify']
            }
        }
    });

    // register task
    grunt.registerTask('default', ['concurrent:target', 'browserSync', 'watch' ]);
    grunt.registerTask('style', ['browserSync', 'watch:sass']);
    grunt.registerTask('dev', ['sass', 'autoprefixer', 'cssmin', 'uglify', 'watch']);
};
