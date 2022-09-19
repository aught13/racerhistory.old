<?php

namespace Controller\Admin;

class Season extends \Controller\Admin {

    public function action_index() {
        $query = \Model\Season::query();

        $pagination = \Pagination::forge('season_infos_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['season_infos'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "Seasons";
        $this->template->content = \View::forge('admin/season/index', $data);
    }

    public function action_view($id = null) {
        $data['season_info'] = \Model\Season::find($id);

        $this->template->title = "Season";
        $this->template->content = \View::forge('admin/season/view', $data);
    }

    public function action_create() {
        if (\Input::method() == 'POST') {
            $val = \Model\Season::validate('create');

            if ($val->run()) {
                $season_info = \Model\Season::forge([
                            'identifier' => \Input::post('identifier'),
                            'start' => \Input::post('start'),
                            'end' => \Input::post('end'),
                ]);

                if ($season_info and $season_info->save()) {
                    \Session::set_flash('success', e('Added season_info #' . $season_info->id . '.'));

                    \Response::redirect('admin/team/season/edit/'.$season_info->identifier);
                } else {
                    \Session::set_flash('error', e('Could not save season_info.'));
                }
            } else {
                \Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Seasons";
        $this->template->content = \View::forge('admin/season/create');
    }

    public function action_edit($id = null) {
        $season_info = \Model\Season::find($id);
        $val = \Model\Season::validate('edit');

        if ($val->run()) {
            $season_info->identifier  = \Input::post('identifier ');
            $season_info->start = \Input::post('start');
            $season_info->end = \Input::post('end');

            if ($season_info->save()) {
                \Session::set_flash('success', e('Updated season_info #' . $id));

                \Response::redirect('admin/season');
            } else {
                \Session::set_flash('error', e('Could not update season_info #' . $id));
            }
        } else {
            if (\Input::method() == 'POST') {
                $season_info->identifier  = $val->validated('identifier ');
                $season_info->start = $val->validated('start');
                $season_info->end = $val->validated('end');

                \Session::set_flash('error', $val->error());
            }

            $this->template->set_global('season_info', $season_info, false);
        }

        $this->template->title = "Seasons";
        $this->template->content = \View::forge('admin/season/edit');
    }

    public function action_delete($id = null) {
        if ($season_info = \Model\Season::find($id)) {
            $season_info->delete();

            \Session::set_flash('success', e('Deleted season_info #' . $id));
        } else {
            \Session::set_flash('error', e('Could not delete season_info #' . $id));
        }

        \Response::redirect('admin/season');
    }

}
