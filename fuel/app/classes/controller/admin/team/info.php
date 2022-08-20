<?php

namespace Controller\Admin\Team;

class Season extends \Controller\Admin {

    public function action_index() {
        $query = \Model\Team\Season::query();

        $pagination = Pagination::forge('season_infos_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['season_infos'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "Season_infos";
        $this->template->content = View::forge('admin/team/season/index', $data);
    }

    public function action_view($id = null) {
        $data['season_info'] = \Model\Team\Season::find($id);

        $this->template->title = "Season_info";
        $this->template->content = View::forge('admin/team/season/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = \Model\Team\Season::validate('create');

            if ($val->run()) {
                $season_info = \Model\Team\Season::forge([
                            'id' => Input::post('id'),
                            'season' => Input::post('season'),
                            'fin' => Input::post('fin'),
                            'notes' => Input::post('notes'),
                            'img' => Input::post('img'),
                            'submitted_date' => Input::post('submitted_date'),
                            'updated_date' => Input::post('updated_date'),
                ]);

                if ($season_info and $season_info->save()) {
                    Session::set_flash('success', e('Added season_info #' . $season_info->id . '.'));

                    Response::redirect('admin/team/season');
                } else {
                    Session::set_flash('error', e('Could not save season_info.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Season_Infos";
        $this->template->content = View::forge('admin/team/season/create');
    }

    public function action_edit($id = null) {
        $season_info = \Model\Team\Season::find($id);
        $val = \Model\Team\Season::validate('edit');

        if ($val->run()) {
            $season_info->id = Input::post('id');
            $season_info->season = Input::post('season');
            $season_info->fin = Input::post('fin');
            $season_info->notes = Input::post('notes');
            $season_info->img = Input::post('img');
            $season_info->submitted_date = Input::post('submitted_date');
            $season_info->updated_date = Input::post('updated_date');

            if ($season_info->save()) {
                Session::set_flash('success', e('Updated season_info #' . $id));

                Response::redirect('admin/team/season');
            } else {
                Session::set_flash('error', e('Could not update season_info #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $season_info->id = $val->validated('id');
                $season_info->season = $val->validated('season');
                $season_info->fin = $val->validated('fin');
                $season_info->notes = $val->validated('notes');
                $season_info->img = $val->validated('img');
                $season_info->submitted_date = $val->validated('submitted_date');
                $season_info->updated_date = $val->validated('updated_date');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('season_info', $season_info, false);
        }

        $this->template->title = "Season_infos";
        $this->template->content = View::forge('admin/team/season/edit');
    }

    public function action_delete($id = null) {
        if ($season_info = \Model\Team\Season::find($id)) {
            $season_info->delete();

            Session::set_flash('success', e('Deleted season_info #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete season_info #' . $id));
        }

        Response::redirect('admin/team/season');
    }

}
