<?php

namespace Controller\Admin;

class Post extends \Controller\Admin {

    public function action_index() {
        $query = \Model\Post::query();

        $pagination = \Pagination::forge('posts_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['posts'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "All Posts";
        $this->template->content = \View::forge('admin/post/index', $data, false);
    }

    public function action_view($id = null) {
        $data['post'] = \Model\Post::find($id);

        $this->template->title = "View Post";
        $this->template->content = \View::forge('admin/post/view', $data, false);
    }

    public function action_create() {
        // Create the fieldset, add the model, repopulate values if needed
        $fieldset = \Fuel\Core\Fieldset::forge('post')->add_model('\Model\post');
        $fieldset->populate('\Model\post', true);

        // Generate the form
        $form = $fieldset->form();

        // Add a submit button
        $form->add('submit', '', ['type' => 'submit', 'value' => 'Add', 'class' => 'btn medium primary']);

        //check for posted values and run validation
        if (\Input::method() == 'POST') {
            //check validation create and save model if sucessful, display errors on fail
            if ($fieldset->validation()->run() == true) {
                $post = new \Model\Post;

                $post->title = $fieldset->validated('title');
                $post->text = $fieldset->validated('text');

                //Save the model to the database redirect to edit entry upon success
                if ($post and $post->save()) {
                    \Session::set_flash('success', e('Added post #' . $post->id . '.'));

                    \Response::redirect('admin/post/edit/' . $post->id);
                } else {
                    \Session::set_flash('error', e('Could not save post.'));
                }
            } else {
                \Session::set_flash('error', $fieldset->show_errors());
            }
        }

        //send form to template
        $this->template->title = "New Post";
        $this->template->set('content', $form->build(), false);
    }

    public function action_edit($id = null) {
        $post = \Model\Post::find($id);
        // Create the fieldset, add the model, repopulate values if needed
        $fieldset = \Fuel\Core\Fieldset::forge('post')->add_model('model\post')->populate($post, true);
        // Generate the form
        $form = $fieldset->form();
        // Add a submit button
        $form->add('submit', '', ['type' => 'submit', 'value' => 'Edit', 'class' => 'btn medium primary']);
        //check for posted values and run validation
        if (\Input::method() == 'POST') {
            //check validation and save model if sucessful, display errors on fail
            if ($fieldset->validation()->run() == true) {
                $field = $fieldset->validated();
                $post->title = $field['title'];
                $post->text = $field['text'];
                //Save the model to the database redirect to edit entry upon success
                if ($post->save()) {
                    \Session::set_flash('success', e('Edited post #' . $post->id . '.'));
                    \Response::redirect('admin/post/edit/' . $post->id);
                } else {
                    \Session::set_flash('error', e('Could not save post.'));
                }
            } else {
                \Session::set_flash('error', $fieldset->show_errors());
            }
        }
        //send form to template
        $this->template->title = "Edit Post";
        $this->template->set('content', $form->build(), false);
    }

    public function action_delete($id = null) {
        if ($post = \Model\Post::find($id)) {
            $post->delete();

            \Session::set_flash('success', e('Deleted post #' . $id));
        } else {
            \Session::set_flash('error', e('Could not delete post #' . $id));
        }

        \Response::redirect('admin/post');
    }

}
